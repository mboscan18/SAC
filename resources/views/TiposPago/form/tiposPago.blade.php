<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('apellido','Descripción del Tipo de Pago:')!!}
		{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la Descripción del Tipo de Pago', 'autofocus'])!!}
	</div>
</div>
<div class="form-group row" >
<br>
	

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}