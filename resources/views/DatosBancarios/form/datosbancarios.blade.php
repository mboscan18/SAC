<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('empresa','Empresa Asociada:')!!}
		{!!Form::select('empresa_id',$empresas,null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">		
		{!!Form::label('id','Nombre del Banco:')!!}
		{!!Form::text('nombreBanco',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre del Banco de la Cuenta'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','Nombre del Titular:')!!}
		{!!Form::text('nombreContacto',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre del Titular de la Cuenta'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','Identificacion del Titular:')!!}
		{!!Form::text('identificacionTitular',null,['class'=>'form-control','placeholder'=>'Ingrese la Cédula o Pasaporte del Titular de la Cuenta'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('email','Email:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Email del Titular'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('telefono','Telefono:')!!}
		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa el Nro de Telefono del Titular'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('agente','Tipo de Cuenta:')!!}
		{!!Form::text('tipoCuenta',null,['class'=>'form-control','placeholder'=>'Ingresa el Tipo de Cuenta'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('id','Nro de Cuenta:')!!}
		{!!Form::text('nroCuentaBancario',null,['class'=>'form-control','placeholder'=>'Ingrese el Codigo de Cuenta', 'maxlength'=>'20', 'onkeypress'=>'return justNumbers(event);'])!!}
	</div>
</div>

<br>

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}