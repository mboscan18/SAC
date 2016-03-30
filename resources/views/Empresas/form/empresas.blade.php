<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('id','Identificacion:')!!}
		{!!Form::text('codIdentificacion_Empresa',null,['class'=>'form-control','placeholder'=>'Ingrese la Cédula o RIF', 'autofocus'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('nombre_Empresa',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre de la Empresa'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('telefono','Telefono:')!!}
		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese el Nro de Telefono de la Empresa'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('agente','Representante de la Empresa:')!!}
		{!!Form::text('nombreContacto',null,['class'=>'form-control','placeholder'=>'Nombre y Apellido del Representante'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('telefono','Dirección:')!!}
		{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese el Nro de Telefono de la Empresa'])!!}
	</div>
</div>
<div class="form-group row" >
<br>
	

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}