@extends('layouts.principal')
@section('page-title', 'Empresas')

@section('titulo')  
    <h3 class="page-header"><i class="icon_building"></i>Empresas</h3>
@endsection
@section('lugar')
   <li><i class="icon_building"></i><a href="{!!URL::to('/Empresas')!!}">Empresas</a></li>
@endsection
@section('accion')
	<li><i class="fa fa-trash-o"></i> Empresas Eliminadas</li>
@endsection

	@section('content')
	    @include('alerts.messages')
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
          <div class="col-lg-8 col-md-8 col-sm-8"> </div>
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Mostrar Empresas Eliminadas" data-placement="bottom" style="height: 45px; text-align: right">
	      		<a href="{!!URL::to('EmpresasDeleted')!!}" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_datosEliminados.png')!!}" style="height: 45px; width: 45px">
	            </a>
	        </div>	
          <br><br><br>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Empresas Eliminadas</div>
                <div class="panel-body" >
		              <div class="empresas">
						<table class="table">
						      <thead>
						        <th>Identificacion</th>
						        <th>Nombre</th>
						        <th>Telefono</th>
						        <th>Nombre de Contacto</th>
						        <th>Eliminado por Usuario</th>
						        <th>Operacion</th>
						      </thead>
						      @foreach($empresas as $empresa)
						        <tbody>
						          <td>{{$empresa->codIdentificacion_Empresa}}</td>
						          <td>{{$empresa->nombre_Empresa}}</td>
						          <td>{{$empresa->telefono}}</td>
						          <td>{{$empresa->nombreContacto}}</td>
						          <td>
						          	{{$empresa->user->nombre_Usuario}} {{$empresa->user->apellido_Usuario}} | {{$empresa->deleted_at->format('d-m-Y, g:ia')}}
						          </td>  
						          <td  style="text-align: center">
									<div class="icon-reorder tooltips" data-original-title="Restaurar" data-placement="right" style="; text-align: center">
										<a href="{!!URL::to('/RestoreEmpresa/'.$empresa->id)!!}" class="" style="text-align: center;">
				                        	<img alt="" src="{!!URL::asset('/img/icon_restore.png')!!}" style="height: 30px; width: 30px">
				                    	</a>
				                    </div>
								  </td>	  
						        </tbody>
						      @endforeach
					    </table>
						<div style="text-align: center">
							{!!$empresas->render()!!}
						</div>
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