@extends('layouts.principal')
@section('page-title', 'Usuarios - Editar')

@section('titulo')  
    <h3 class="page-header"><i class="icon_group"></i>Usuarios</h3>
@endsection
@section('lugar')
   <li><i class="icon_group"></i><a href="{!!URL::to('/Usuarios')!!}">Usuarios</a></li>
@endsection
@section('accion')
    <li><i class="fa fa-pencil"></i>Editar Usuario</li>
@endsection


	@section('content')
              @include('alerts.request')

            <!-- page start-->
              <div class="col-lg-2 col-md-2 col-sm-2"></div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos de Usuario</div>
                    <div class="panel-body" >
                      {!!Form::model($user,['route'=>['Usuarios.update',$user],'method'=>'PUT','files' => true])!!}
                          @include('Usuarios.form.users')
                          @if($user->foto == null)
                                <div class="col-lg-6" style="text-align: right">
                                    {!!Form::label('foto','Foto del Usuario (Opcional):')!!}
                                </div>
                                <div class="col-lg-6 icon-reorder tooltips" data-original-title="Editar Logo" data-placement="top">
                                    {!!Form::file('foto',['accept' => 'image/*'])!!}
                                </div>
                            @else
                                <div class="col-lg-12" style="text-align: center">
                                    <img src="{!!URL::asset('archivos/'.$user->foto)!!}" alt="" style="height:100px;"/>
                                    
                                    <br><br>
                                    <div class="col-lg-6" style="text-align: right">
                                      {!!Form::label('foto','Foto del Usuario:')!!}
                                    </div>
                                    <a href="{!!URL::to('/deleteFileUsuario/'.$user->id)!!}" class="icon-reorder tooltips col-lg-1" data-original-title="Eliminar Foto" data-placement="top" style=" text-align: center">
                                        <img src="{!!URL::asset('img/icon_delete.png')!!}" alt="" style="width:25px; "/>
                                    </a>
                                    <div class="col-lg-5 icon-reorder tooltips" data-original-title="Editar Foto" data-placement="top">
                                      {!!Form::file('foto',['accept' => 'image/*'])!!}
                                    </div>
                                </div>  
                                <br><br>
                            @endif  
                            </div>
                        
                          	 <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right">
                              <button type="submit" class="btn btn-info" style="width:100%"><i class="icon_floppy"></i> Guardar</button>
                          	</div>
                      {!!Form::close()!!}
                      <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:left">

                      {!!Form::open(['route'=>['Usuarios.destroy', $user], 'method' => 'DELETE'])!!}
                          <button type="submit" class="btn btn-danger" style="width:100%"><i class="fa fa-trash-o fa-lg"></i> Eliminar</button>
            					{!!Form::close()!!}
					</div>
                    </div>
                </div>
              </div>
            <!-- page end-->
		
	@endsection