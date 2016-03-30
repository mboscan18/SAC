<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('id','Identificacion:')!!}
		{!!Form::text('identificacion_Usuario',null,['class'=>'form-control','placeholder'=>'Ingresa el Nro de Cedula del usuario'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('nombre_Usuario',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('apellido','Apellido:')!!}
		{!!Form::text('apellido_Usuario',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido del usuario'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('sexo','Sexo:')!!}
		{!!Form::select('sexo_Usuario',array(
										'M' => 'Masculino', 
										'F' => 'Femenino'),null,['class'=>'form-control','placeholder' => 'Seleccione el sexo del Usuario']
									)!!}
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('rol','Rol:')!!}
		{!!Form::select('rol_Usuario',array(
										'administrador' => 'Administrador', 
										'supervisor' => 'Supervisor', 
										'residente' => 'Administrador de Contratos', 
										'contador' => 'Administrador de Finanzas'),null,['class'=>'form-control','placeholder' => 'Seleccione el rol del Usuario']
									)!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('email','Correo Electronico:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Correo Electronico del usuario'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('telefono','Telefono:')!!}
		{!!Form::text('telefono_Usuario',null,['class'=>'form-control','placeholder'=>'Ingresa el Nro de Telefono del usuario'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('password','Contraseña:')!!}
		{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese Contraseña (minimo 5 caracteres)'])!!}
	</div>
</div>
<div class="form-group row" >

<br>
	
	{!!Form::hidden('id',null,null)!!}
	
