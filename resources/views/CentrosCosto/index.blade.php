@extends('layouts.principal')
  @section('page-title', 'Centros de Costo')

@section('titulo')  
    <h3 class="page-header"><i class="icon_documents"></i> Centros de Costo</h3>
@endsection
@section('lugar')
   <li><i class="icon_documents"></i> Centros de Costo</li>
@endsection
@section('accion')
@endsection

  @section('content')
        @include('alerts.messages')

        <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Centro de Costo" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('CentrosCosto/create')!!}" class="" style="text-align: right; ">
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
	          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Centros de Costo Eliminados" data-placement="bottom" style="height: 45px; text-align: right">
		      		<a href="{!!URL::to('CentrosCostoDeleted')!!}" class="" style="text-align: right; ">
						<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
		            </a>
		        </div>	
		  @endif 
          <br><br><br>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Centros de Costo</div>
                <div class="panel-body" >
	              		<div class="centrosCosto">
							<table class="table">
					      		<thead>
							        <th>Codigo</th>
							        <th>Descripcion</th>
							        @if(Auth::user()->rol_Usuario == 'administrador')
						        		<th>Ultima Modificacion</th>
						        	@endif	
							        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							        	<th>Operacion</th>
							        @endif	
						      	</thead>
						      @foreach($cc as $centros)
						        <tbody>
						          <td>{{$centros->cod_CC}}</td>
						          <td>{{$centros->descripcion_CC}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$centros->user->nombre_Usuario}} {{$centros->user->apellido_Usuario}} | {{$centros->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif    
					            	@if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
								          <td  style="text-align: center">
											<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
												<a href="{!!URL::to('/CentrosCosto/'.$centros->id.'/edit')!!}" class="" style="text-align: center;">
						                        	<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
						                    	</a>
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