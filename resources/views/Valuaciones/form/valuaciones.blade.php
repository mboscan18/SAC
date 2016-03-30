<div class="row">
	<div class="form-group col-lg-3 col-md-3 col-sm-3 round-input">
		{!!Form::label('num','Numero de Boletín:')!!}
		{!!Form::text('nro_Boletin',$nroBoletin,['class'=>'form-control', 'onkeypress'=>'return justNumbers(event);'])!!}
	</div>
	<div class="form-group col-lg-3 col-md-3 col-sm-3 round-input">
		{!!Form::label('num','Impuesto (IVA):')!!}
		<div class="input-group">
		  <input id="IVA" name="IVA" type="text" value="{{$IVA}}" class="form-control" onkeypress="return justNumbers(event);" placeholder="IVA" >
		  <span class="input-group-addon" id="porcentaje_Anticipo_symbol">&nbsp;%&nbsp;</span>
		</div>
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_ini','Fecha de Pago:')!!}
		{!!Form::date('fecha_Pago',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="row">	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('periodo','Inicio Período:')!!}
		{!!Form::date('fecha_Inicio_Periodo',null,['class'=>'form-control', 'placeholder'=>'Fecha inicio del Período'])!!}
	</div>	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('periodo','Fin Período:')!!}
		{!!Form::date('fecha_Fin_Periodo',null,['class'=>'form-control', 'placeholder'=>'Fecha fin del Período'])!!}
	</div>	
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('num','Observaciones del Boletín (Opcional):')!!}
		{!!Form::textarea('observaciones',null,['class'=>'form-control','placeholder'=>'Observaciones del Boletín', 'rows'=>'4'])!!}
	</div>
</div>

<div class="form-group row" >
<br>

{!!Form::hidden('contrato_id',$contrato->id,null)!!}
{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}