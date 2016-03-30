<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('id','Nombre:')!!}
		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre del Firmante', 'autofocus'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','Apellido:')!!}
		{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese el Apellido del Firmante'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('telefono','Cargo del Firmante:')!!}
		{!!Form::text('cargo',null,['class'=>'form-control','placeholder'=>'Ingrese el Título del firmante.'])!!}
	</div>
</div>
<div class="form-group row" >
<br>
	

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}