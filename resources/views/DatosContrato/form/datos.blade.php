<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Impuesto (IVA):')!!}
		<div class="input-group">
		  <input id="IVA" name="IVA" type="text" value="{{$contrato->IVA}}" class="form-control" autofocus onkeypress="return justNumbers(event);" placeholder="IVA" >
		  <span class="input-group-addon" id="porcentaje_Anticipo_symbol">&nbsp;%&nbsp;</span>
		</div>
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Porcentaje de Anticipo:')!!}
		<div class="input-group">
		  <input id="anticipo" name="porcentajeAnticipo" type="text" value="{{$contrato->porcentajeAnticipo}}" class="form-control" onkeypress="return justNumbers(event);" placeholder="Indique el Porcentaje de Anticipo" >
		  <span class="input-group-addon" id="porcentaje_Anticipo_symbol">&nbsp;%&nbsp;</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Cantidad de Facturas Estimadas:')!!}
		{!!Form::text('nroFacturas',null,['class'=>'form-control','placeholder'=>'Indique el Número estimado de facturas del Contrato', 'onkeypress'=>'return justNumbers(event);'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Forma de Pago:')!!}
		{!!Form::text('forma_pago',null,['class'=>'form-control','placeholder'=>'Indique la forma de pago del Contrato'])!!}
	</div>
</div>

<div class="form-group row" >
<br>
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('id',$contrato->id,null)!!}