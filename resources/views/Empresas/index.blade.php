@extends('layouts.principal')
@section('page-title', 'Empresas')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Empresas</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i> Empresas</li>
@endsection
@section('accion')
@endsection

	@section('content')
	    @include('alerts.messages')
	    @include('alerts.errors')

	      	<?php
	        	Session::put('origen',1);
	        ?>	
	    <!-- page start-->
	    <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Empresa" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('Empresas/create')!!}" class="" style="text-align: right; ">
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
	          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Empresas Eliminadas" data-placement="bottom" style="height: 45px; text-align: right">
		      		<a href="{!!URL::to('EmpresasDeleted')!!}" class="" style="text-align: right; ">
						<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
		            </a>
		        </div>	
		  @endif      
          <br><br><br>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Empresas</div>
                <div class="panel-body" >
		              <div class="empresas">
						<table class="table" id="table_empresas" class="display">
						      <thead>
						        <th>Logo</th>
						        <th>Identificacion</th>
						        <th>Nombre</th>
						        <th>Telefono</th>
						        <th>Representante</th>
						        @if(Auth::user()->rol_Usuario == 'administrador')
						        	<th>Ultima Modificacion</th>
						        @endif		
						        @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
						        	<th>Operacion</th>
						        @endif	
						      </thead>
						        <tbody>
						      @foreach($empresas as $empresa)
						      <tr>
						          <td>
						          	@if($empresa->logo == null)
						          		<img src="img/no_empresa.png" alt="" style="width:50px;"/>
						          	@else
						          		<img src="archivos/{{$empresa->logo}}" alt="" style="width:50px;"/>
						          	@endif	
						          </td>
						          <td>{{$empresa->codIdentificacion_Empresa}}</td>
						          <td>{{$empresa->nombre_Empresa}}</td>
						          <td>{{$empresa->telefono}}</td>
						          <td>{{$empresa->nombreContacto}}</td>
						          @if(Auth::user()->rol_Usuario == 'administrador')
							          <td>
							          	{{$empresa->user->nombre_Usuario}} {{$empresa->user->apellido_Usuario}} | {{$empresa->updated_at->format('d-m-Y, g:ia')}}
							          </td>
							      @endif    
						          @if((Auth::user()->rol_Usuario == 'administrador') || (Auth::user()->rol_Usuario == 'residente'))
							          <td  style="text-align: center">
										<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
											<a href="{!!URL::to('/Empresas/'.$empresa->id.'/edit')!!}" class="" style="text-align: center;">
					                        	<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
					                    	</a>
					                    </div>
									  </td>
								  @endif	
							  </tr>	  
						      @endforeach
					    	</tbody>
					    </table>
					</div>
                </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>

            <!-- page end-->
	
	@endsection
	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@endsection