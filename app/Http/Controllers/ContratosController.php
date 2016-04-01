<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Proyectos;
use SAC\Empresas;
use SAC\Contratos;
use SAC\OrdenServicio;
use SAC\Monedas;
use SAC\TiposContratos;
use SAC\Valuaciones;
use SAC\Presupuestos;
use SAC\FirmasValuacion;
use SAC\FirmasOrdenServicio;
use SAC\VariacionPresupuesto;
use SAC\Firmantes;
use SAC\Procedimientos;
use SAC\CentrosCosto;
use SAC\Capitulos;
use SAC\DetalleValuacion;
use Input;
use Session;
use Redirect;
use DB;

use SAC\Http\Requests;
use SAC\Http\Requests\ContratosRequest;
use SAC\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class ContratosController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth');
        $this->middleware('residente',['only' => ['create','store','edit','update','destroy']]);
        $this->middleware('residente_sup',['only' => ['index']]);
        $this->middleware('administrador',['only' => ['showDeletes','restore']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contratos::paginate(10);
        return view('Contratos.index',compact('contratos'));
    }

    public function showDeletes()
    {
        $contratos = Contratos::onlyTrashed()->paginate(10);
        return view('Contratos.deleted',compact('contratos'));

    }

    public function restore($id)
    {
        DB::table('Contratos')
            ->where('id', $id)
            ->update(['deleted_at' => null]);
        
        Session::flash('message-sucess','Contrato Restaurado Correctamente.');
        return Redirect::to('/ContratosDeleted');
        

    }

    public function showContratos($proyecto_id)
    {

        $contratosProy = Contratos::contratosPorProyecto($proyecto_id);
        $proyecto = Proyectos::find($proyecto_id);
        $contratos = array();
        $i = 0;
        foreach ($contratosProy as $key) {
            $contratos[$i] = Contratos::find($key->id);
            $i++;
        }


        return view('Contratos.index',compact('contratos', 'proyecto'));
    }

    public function generarOrdenServicio($contrato){
        $contratos = Contratos::find($contrato);
        $partidas = Presupuestos::partidas($contrato);
        $valuaciones = Valuaciones::valuaciones($contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($contrato);
        if ($nroAdendum >= 0) {
            $valorContratoAnterior = VariacionPresupuesto::valorContratoAdendum($contrato, $nroAdendum);
            $ordenServicioAnterior = OrdenServicio::ordenServicio($contrato, $nroAdendum);
        }else{
            $valorContratoAnterior = 0;
            $ordenServicioAnterior = 0;

        }
        $valorContrato = Presupuestos::valorContrato($contrato);

        $proyectoDescripcion = Procedimientos::stringSeparado($contratos->proyecto->nombre_Proyecto, 115);
        $contratoDescripcion = Procedimientos::stringSeparado($contratos->descripcion, 123);
        $contratoObservaciones = Procedimientos::stringSeparado($contratos->observaciones, 123);
      // return $contratoObservaciones;
        $nombreReporte = 'Contrato ('.$contratos->nro_Contrato.') - Orden de Servicio '.$nroAdendum;

        $firmasOrdenServicio = FirmasOrdenServicio::firmasOrdenServicio($contrato);
        $firmantes_cliente = array();
        $firmantes_proveedor = array();
        $i = -1;
        $j = -1;
        foreach ($firmasOrdenServicio as $key) {
            if ($key->empresa == 1) {
                $i++;
                $firmantes_cliente[$i] = $key;
            }elseif ($key->empresa == 2) {
                $j++;
                $firmantes_proveedor[$j] = $key;
            }
        }

        if (($firmantes_cliente == null) || ($firmantes_proveedor == null)) {
            Session::flash('message-warning','Debe cargar Firmantes sobre la Orden de Servicio.');
            return Redirect::to('/FirmasContrato/'.$contrato);
        }

        $nroAdendum ++;

        $pdf = \PDF::loadHTML(
            view('Reportes.orden_servicio')
                ->with('contratos',$contratos)
                ->with('partidas',$partidas)
                ->with('valorContrato',$valorContrato)
                ->with('proyectoDescripcion',$proyectoDescripcion)
                ->with('contratoDescripcion',$contratoDescripcion)
                ->with('contratoObservaciones',$contratoObservaciones)
                ->with('nroAdendum',$nroAdendum)

                ->with('valorContratoAnterior',$valorContratoAnterior)
                ->with('ordenServicioAnterior',$ordenServicioAnterior)
                ->with('nombreReporte',$nombreReporte)

                ->with('firmantes_cliente',$firmantes_cliente)
                ->with('firmantes_proveedor',$firmantes_proveedor)
                ->render()
            );
        $y = 1;

        return $pdf->setPaper('letter')->setOrientation('portrait')->stream($nombreReporte.'.pdf');  
    }


    public function firmarContrato($id_contrato, $lugar)
    {
        $contrato = Contratos::find($id_contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($id_contrato);
        $partidas = Presupuestos::partidas($id_contrato);

        if($nroAdendum < $contrato->orden_adendum){
            $nroAdendum ++;

            $contrato->orden_adendum = $nroAdendum;
            $contrato->save();

            $ordenServicio = new OrdenServicio;
            $ordenServicio->contrato_id     = $contrato->id;
            $ordenServicio->fecha_inicio    = $contrato->fecha_inicio;
            $ordenServicio->fecha_fin       = $contrato->fecha_fin;
            $ordenServicio->fecha_firma     = $contrato->fecha_firma;
            $ordenServicio->descripcion     = $contrato->descripcion;
            $ordenServicio->observaciones   = $contrato->observaciones;
            $ordenServicio->orden_adendum   = $contrato->orden_adendum;
            $ordenServicio->usuario         = $this->auth->user()->id;
            $ordenServicio->save();

            foreach ($partidas as $key) {

                $ordenVariacion = VariacionPresupuesto::ordenVariacion($key->id);

                if ($ordenVariacion < $key->orden_Variacion) {
                    $ordenVariacion++;

                    $key->orden_Variacion = $ordenVariacion;
                    $key->save();
                }

                $variacionPresupuesto = new VariacionPresupuesto;
                $variacionPresupuesto->partida_id       = $key->id;
                $variacionPresupuesto->descripcion      = $key->descripcion;
                $variacionPresupuesto->unidad           = $key->unidad;
                $variacionPresupuesto->cantidad         = $key->cantidad;
                $variacionPresupuesto->monto_Total      = $key->monto_Total;
                $variacionPresupuesto->orden_adendum    = $nroAdendum;
                $variacionPresupuesto->orden_Variacion  = $key->orden_Variacion;
                $variacionPresupuesto->usuario          = $this->auth->user()->id;
                $variacionPresupuesto->save();
            }

            Session::flash('message-sucess','Orden de Servicio firmada Correctamente.');

        }else{
            Session::flash('message-sucess','No hay Orden de Servicio Pendiente por firmar.');
        }

        if(Session::has('valuacion')){
            $valuacion = Session::get('valuacion');
        }else{
            $valuacion = null;
        }

        switch ($lugar) {
                case 1:     // Desde Opciones del Contrato
                    return Redirect::to('/OpcionesContrato/'.$id_contrato);
                
                case 2:     // Desde Opciones de Adendum 
                    return Redirect::to('/Adendum/'.$id_contrato);
                
                case 3:     // Desde Boletines de un Contrato
                    return Redirect::to('/Boletines/'.$id_contrato);
                
                case 4:     // Desde Opciones de una Valuacion
                    return Redirect::to('/OpcionesValuacion/'.$valuacion->id);
                
                case 5:     // Desde Detalle de una Valuacion
                    return Redirect::to('/DetalleValuacion/'.$valuacion->id.'/null');
                
                case 6:     // Desde Anticipos de una Valuacion
                    return Redirect::to('/Anticipo/'.$valuacion->id);
                
                case 7:     // Desde Descuentos de una Valuacion
                    return Redirect::to('/Descuento/'.$valuacion->id);
            }    
        
    }

    public function generarResumenContrato($id_contrato)
    {
        
        $contrato = Contratos::find($id_contrato);
        $valuaciones = Valuaciones::valuaciones($id_contrato);
        $nombreReporte = 'Contrato ('.$contrato->nro_Contrato.') - Resumen de Valuaciones';

        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $valorContratoInicial = VariacionPresupuesto::valorContratoAdendum($id_contrato, 0);

        $proyectoDescripcion = Procedimientos::stringSeparado($contrato->proyecto->nombre_Proyecto, 115);
        $contratoDescripcion = Procedimientos::stringSeparado($contrato->descripcion, 123);

        $pdf = \PDF::loadHTML(
            view('Reportes.resumenContrato')
                ->with('contrato',$contrato)
                ->with('valuaciones',$valuaciones)
                ->with('nombreReporte',$nombreReporte)

                ->with('proyectoDescripcion',$proyectoDescripcion)
                ->with('contratoDescripcion',$contratoDescripcion)
                ->render()
            );

        return $pdf->setPaper('letter')->setOrientation('landscape')->stream($nombreReporte.'.pdf');  
        
    }


    public function opcionesContrato($id_contrato)
    {

        $contrato = Contratos::find($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($id_contrato);

        $partidasIscreada = Contratos::partidasIscreada($id_contrato);
        if ($partidasIscreada > 0) {
            if($nroAdendum < $contrato->orden_adendum){
                Session::flash('message-warning','firmar-adendum');
                Session::flash('origen',1);
            } 
        }

       return view('Contratos.opcionesContrato')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('nroAdendum',$nroAdendum)
                
                ->render();
    }

    public function adendumContrato($id_contrato)
    {

        $contrato = Contratos::find($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($id_contrato);

        if($nroAdendum < $contrato->orden_adendum){
            Session::flash('message-warning','firmar-adendum');
            Session::flash('origen',2);
        }    

       return view('Adendum.adendumContrato')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('nroAdendum',$nroAdendum)
                
                ->render();
    }


    public function adendumEditarContrato($id_contrato)
    {

        $contrato = Contratos::find($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($id_contrato);  

       return view('Adendum.editContrato')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)

                ->with('nroAdendum',$nroAdendum)
                
                ->render();
    }

    public function adendumCrearPartida($id_contrato)
    {

        $contrato = Contratos::find($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($id_contrato);
        $partidas    = Presupuestos::partidas($id_contrato);
        $capitulos = Capitulos::all();
        $contratos = $contrato;

        
       return view('Adendum.agregarPartida')
                ->with('contrato',$contrato)
                ->with('contratos',$contratos)
                ->with('valorContrato',$valorContrato)
                ->with('partidas',$partidas)
                ->with('capitulos',$capitulos)

                ->with('nroAdendum',$nroAdendum)
                
                ->render();
    }
    
    public function adendumEditarPartida($id_contrato)
    {

        $contrato = Contratos::find($id_contrato);
        $valorContrato = Presupuestos::valorContrato($id_contrato);
        $nroAdendum = OrdenServicio::ordenAdendum($id_contrato);
        $partidas    = Presupuestos::partidas($id_contrato);

        $cantidadesTrabajadas = array();
        $i = 0;
        foreach ($partidas as $key) {
            $cant = DetalleValuacion::cantidadTrabajadaPartidaTotal($key->id);
            $cantidadesTrabajadas[$i] = $cant;
            $i++;
        }


       return view('Adendum.editPartida')
                ->with('contrato',$contrato)
                ->with('valorContrato',$valorContrato)
                ->with('partidas',$partidas)
                ->with('cantidadesTrabajadas',$cantidadesTrabajadas)

                ->with('nroAdendum',$nroAdendum)
                
                ->render();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::lists('nombre_Empresa', 'id');
        $proyectos = Proyectos::lists('nombre_Proyecto', 'id');
        $monedas = Monedas::all();
        $tiposContratos = TiposContratos::lists('descripcion', 'id');

        if(Session::has('proyecto')){
            $proyecto = Session::get('proyecto');
        }else{
            return 'Error al recibir Proyecto';
        }
        $cont1=0;
        $cont2=0;
        foreach ($empresas as $var) {
            $cont1++;
        }
        foreach ($proyectos as $var) {
            $cont2++;
        }
        if($cont2 == 0){
            Session::flash('message-error','Es necesario tener Proyectos Creados para crear Contratos');
            return 'Proyectos/create';
        }
        return view('Contratos.create',compact('empresas','proyecto','monedas','tiposContratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratosRequest $request)
    {
        Contratos::create($request->all());
        $contrato = Contratos::contratoPorNroContrato(Input::get('nro_Contrato'));

        Session::flash('message-sucess','Contrato Creado Correctamente');
        return Redirect::to('/OpcionesContrato/'.$contrato[0]->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contratos = Contratos::find($id);
        $empresas = Empresas::lists('nombre_Empresa', 'id');
        $proyectos = Proyectos::lists('nombre_Proyecto', 'id');
        $monedas = Monedas::all();

        if(Session::has('ordenAdendum')){
            $nroAdendum = Session::get('ordenAdendum');
        }else{
            return 'Error al recibir Nro Adendum';
        }

        $tiposContratos = TiposContratos::lists('descripcion', 'id');
        return view('Contratos.edit',compact('contratos','empresas','proyectos','monedas','nroAdendum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratosRequest $request, $id)
    {
        $contratos = Contratos::find($id);
        $contratos->fill($request->all());
        $contratos->orden_adendum = $contratos->orden_adendum + 1;
        $contratos->save();
        Session::flash('message-sucess','Contrato Actualizado Correctamente');
        return Redirect::to('/OpcionesContrato/ '.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contratos::find($id);
        $contrato->delete();
        Session::flash('message-sucess','Contrato Eliminado Correctamente');
        return Redirect::to('/Contrato/'.$contrato->cod_Proyecto);
    }
}
