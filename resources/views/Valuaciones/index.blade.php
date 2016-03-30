@extends('layouts.principal')
  @section('page-title', 'Valuaciones')

@section('titulo')  
    <h3 class="page-header"><img alt="" src="{!!URL::asset('/img/icon_contrato.png')!!}" style="width: 39px"> Valuaciones</h3>
@endsection
@section('lugar')
	<li><img alt="" src="{!!URL::asset('/img/icon_project_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Proyectos')!!}"> Proyectos</a></li>
	<li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"><a href="{!!URL::to('/Contrato/'.$valuaciones[0]->contrato->proyecto->id)!!}"> Contratos (Proyecto: {{$valuaciones[0]->contrato->proyecto->cod_Proyecto}})</a></li>
   <li><img alt="" src="{!!URL::asset('/img/icon_contrato_small.png')!!}" style="width: 15px"> Valuaciones (Contrato: {{$valuaciones[0]->contrato->nro_Contrato}})</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')
        @include('alerts.errors')

        <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Valuacion" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('Valuaciones/create')!!}" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_add.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>	
 			<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a Excel" data-placement="bottom" style="height: 45px; width: 30%">
	            <a href="" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_excel.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>
            <div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a PDF" data-placement="bottom" style="height: 45px; width: 30%">
	            <a href="" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_pdf.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>
          </div>
          @if(Auth::user()->rol_Usuario == 'administrador')
	          <div class="col-lg-8 col-md-8 col-sm-8"> </div>
	          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Proyectos Eliminados" data-placement="bottom" style="height: 45px; text-align: right">
		      		<a href="{!!URL::to('ContratosDeleted')!!}" class="" style="text-align: right; ">
						<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
		            </a>
		        </div>	
		  @endif 
          <br><br><br>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Valuaciones</div>
                <div class="panel-body" >
	              		<div class="datoBancario">
							<table class="table">
					      		<thead>
					      			<th>Nro de Valuacion</th>
							        <th>Contrato Asociado</th>
							        <th>Periodo de Valuación</th>
							        <th>Avance Físico</th>
							        <th>Avance Financiero</th>
							        @if(Auth::user()->rol_Usuario == 'administrador')
						        		<th>Ultima Modificacion</th>
						        	@endif	
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							        	<th>Operaciones</th>
							        @endif	
						      	</thead>
						      @foreach($valuaciones as $datos)
						        <tbody>
						          <td>{{$datos->nro_Valuacion}}</td>
						          <td>{{$datos->contrato->nro_Contrato}}</td>
						          <td>{{$datos->fecha_Inicio_Periodo}} - {{$datos->fecha_Fin_Periodo}}</td>
						          <td>{{$datos->avance_fisico}}</td>
						          <td>{{$datos->avance_financiero}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$datos->user->nombre_Usuario}} {{$datos->user->apellido_Usuario}} | {{$datos->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif   
					            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
								          <td class=" col-lg-1" style="text-align: center">
							          			<div class=" col-lg-1"  style=" text-align: center; ">
													<a href="{!!URL::to('/Valuaciones/'.$datos->id.'/edit')!!}" class="icon-reorder tooltips" data-original-title="Editar" data-placement="bottom" style="text-align: center;">
							                        	<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
							                    	</a>
							                    </div>
							                    <div class="col-lg-1" style=" text-align: center; ">
													<a href="{!!URL::to('/Presupuesto/'.$datos->id)!!}" class="icon-reorder tooltips "  data-original-title="Presupuesto" data-placement="bottom" style="text-align: center;">
							                        	<img alt="" src="{!!URL::asset('/img/icon_presupuesto.png')!!}" style="height: 30px; width: 30px">
							                       	</a>
							                    </div>

								          	</div>
											
										  </td>
								  	@endif
						        </tbody>
						      @endforeach
						    </table>
						</div>
                </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <!-- page start-->
              
            <!-- page end-->
	@endsection
	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@endsection