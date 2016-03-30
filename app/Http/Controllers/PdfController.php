<?php

namespace SAC\Http\Controllers;

use Illuminate\Http\Request;
use SAC\Valuaciones;
use SAC\Contratos;

use SAC\Http\Requests;
use SAC\Http\Controllers\Controller;
use PDF;

class PdfController extends Controller
{

    public function invoice() 
    {
        /*
         $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $pdf = PDF::loadHTML(
            view('invoice')->render()
            )->setPaper('letter')->setOrientation('landscape');
        return $pdf->stream('invoice');*/
        $contrato = 1;

        $contratos = Contratos::find($contrato);
        $valuaciones = Valuaciones::valuaciones($contrato);

        /*$pdf = \App::make('dompdf.wrapper');
$pdf->loadHTML(view('invoice')->render());
return $pdf->stream();*/

       // return view('Adendum.Reporte', compact('contratos','valuaciones'));
        //$pdf = \App::make('dompdf.wrapper');
        $pdf = \PDF::loadHTML(
            view('Adendum.Reporte')
                ->with('contratos',$contratos)
                ->with('valuaciones',$valuaciones)
                ->render()
            );
        /*$view =  \View::make('invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);*/
        $y = 1;
        return $pdf->setPaper('letter')->setOrientation('landscape')->stream('Orden de servicio '.$y);  
    }

    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'         => '500',
            'total'         => '500'
        ];
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
