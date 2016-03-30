@extends('layouts.principal')
@section('page-title', 'Usuarios')

@section('titulo')  
    <h3 class="page-header"><i class="icon_group"></i>Usuarios</h3>
@endsection
@section('lugar')
   <li><i class="icon_group"></i> Usuarios</li>
@endsection
@section('accion')
@endsection

@section('content')
          @include('alerts.messages')
          

                  <!-- page start-->

          <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: center;">
          	<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Crear Usuario" data-placement="bottom" style="height: 45px; width: 30%">
	      		<a href="{!!URL::to('Usuarios/create')!!}" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_add.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>	
 			<div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a Excel" data-placement="bottom" style="height: 45px; width: 30%">
	            <a href="" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>
            <div class="icon-reorder tooltips col-lg-1 col-md-1 col-sm-1" data-original-title="Exportar a PDF" data-placement="bottom" style="height: 45px; width: 30%">
	            <a href="" class="" style="text-align: right; ">
					<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 45px; width: 45px">
	            </a>
            </div>
          </div>
          <br><br><br>

          <div class="col-lg-1 col-md-1 col-sm-1"></div>
          <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading " style="background-color: #1a2732; color: #9cd5eb">Usuarios</div>
                <div class="panel-body" >
		              <div class="users">
						<table class="table col-lg-12 col-md-12 col-sm-12">
							<thead>
								<th>Foto</th>
								<th>Identificacion</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Sexo</th>
								<th>Telefono</th>
								<th>Correo Electronico</th>
								<th>Rol</th>
								@if(Auth::user()->rol_Usuario == 'administrador')
									<th>Operacion</th>
								@endif
							</thead>
							@foreach($users as $user)
								<tbody>
									<td>
										@if($user->foto == null)
							          		<img src="{!!URL::asset('/img/no_usuario.png')!!}" alt="" style="width:50px;"/>
							          	@else
							          		<img src="{!!URL::asset('/archivos/'.$user->foto)!!}" alt="" style="width:50px;"/>
							          	@endif

									</td>
									<td>{{$user->identificacion_Usuario}}</td>
									<td>{{$user->nombre_Usuario}}</td>
									<td>{{$user->apellido_Usuario}}</td>
									<td>{{$user->sexo_Usuario}}</td>
									<td>{{$user->telefono_Usuario}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->rol_Usuario}}</td>
									@if(Auth::user()->rol_Usuario == 'administrador')
										<td  style="text-align: center">
											<div class="icon-reorder tooltips" data-original-title="Editar" data-placement="right" style="; text-align: center">
												<a href="{!!URL::to('/Usuarios/'.$user->id.'/edit')!!}" class="" style="text-align: center;">
						                        	<img alt="" src="{!!URL::asset('/img/icon_edit.png')!!}" style="height: 30px; width: 30px">
						                    	</a>
						                    </div>
										</td>
									@endif
								</tbody>
							@endforeach
						</table>
						<div style="text-align: center">
							{!!$users->render()!!}
						</div>
					</div>
                </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <!-- page end-->

        

@endsection