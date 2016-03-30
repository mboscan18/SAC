
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_ini','Fecha Inicio Contrato:')!!}
		{!!Form::date('fecha_inicio',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_fin','Fecha Fin Contrato:')!!}
		{!!Form::date('fecha_fin',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_presupuesto','Fecha de firma del Adendum:')!!}
		{!!Form::date('fecha_firma',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Objeto del Contrato:')!!}
		{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la descripción del Contrato', 'rows'=>'2'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('num','Observaciones del Contrato (Opcional):')!!}
		{!!Form::textarea('observaciones',null,['class'=>'form-control','placeholder'=>'Observaciones del Contrato', 'rows'=>'5'])!!}
	</div>
</div>

<br>

{!!Form::hidden('usuario',Auth::user()->id,null)!!}