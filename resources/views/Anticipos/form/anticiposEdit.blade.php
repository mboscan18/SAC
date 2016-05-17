<div class="row" style="background-color: #d4e2ed; color: #20374a">	
	<div class="form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a">
		{!!Form::label('periodo','Información del Contrato:')!!}
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12" ></div>


	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Monto Total del Contrato sin Impuestos:')!!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4" >
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($valorContrato, 2, ',', '.'),[ 'id'=>''])!!}
		  {!!Form::hidden('ValorContrato',$valorContrato,['id'=>'ValorContrato'])!!}

	</div>
	<div class="col-lg-2 col-md-2 col-sm-2" >
		{!!Form::label('periodo','100 %',[ 'id'=>''])!!}
	</div>

	<div class="form-group col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
		{!!Form::label('periodo','Monto Faltante por Pagar:')!!}
	</div>
	<div class="form-group col-lg-4 col-md-4 col-sm-4" >
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('cant',number_format($montoEjecutado, 2, ',', '.'),[ 'id'=>''])!!}
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('cant',number_format($montoAnticipos, 2, ',', '.'),[ 'id'=>''])!!}
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('cant',number_format($montoAdelantos, 2, ',', '.'),[ 'id'=>''])!!}
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('cant',number_format($montoFaltante, 2, ',', '.'),[ 'id'=>''])!!}
		  {!!Form::hidden('montoFaltantePagar',$montoFaltante,['id'=>'montoFaltantePagar'])!!}
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2" >
		{!!Form::label('periodo',number_format($porcentajeFaltante, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
	</div>
	
</div>
	<br>

<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('estado','Tipo de Adelanto:')!!}
		{!!Form::select('tipo_Anticipo',array(
										null => 'Seleccione el tipo de Adelanto', 
										1 => 'Anticipo', 
										2 => 'Adelanto de Factura'),null,['class'=>'form-control']
									)!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Concepto del Adelanto:')!!}
		{!!Form::text('concepto_Anticipo',null,['class'=>'form-control', 'placeholder'=>'Ingrese el Concepto del Adelanto'])!!}
	</div>
</div>
<div class="row">	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('periodo','Porcentaje del Adelanto:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="porcentaje_Anticipo_symbol">&nbsp;%&nbsp;</span>
		  <input id="porcentaje_Anticipo_form" name="" type="text" class="form-control" onkeypress="return justNumbers(event);" placeholder="Porcentaje del Adelanto" style="background-color: #d4e2ed; color: #20374a" >
		  {!!Form::hidden('porcentaje_Anticipo',null,['id'=>'porcentaje_Anticipo'])!!}
		</div>
	</div>	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('periodo','Monto del Adelanto:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="monto_Anticipo_Moneda">{{$valuacion->contrato->moneda->symbol}}</span>
		  <input id="monto_Anticipo_form" name="" type="text" class="form-control" onkeypress="return justNumbers(event);" placeholder="Monto del Adelanto" style="background-color: #d4e2ed; color: #20374a" >
		  {!!Form::hidden('monto_Anticipo',null,['id'=>'monto_Anticipo'])!!}

		</div>
	</div>
	<div style="text-align: center;">
		{!!Form::label('total','El monto del Adelanto no puede ser mayor que el Monto Faltante por Pagar.',['id'=>'MsjCantPasada',  'class'=>' tam-14'])!!}
	</div>	
</div>

<div class="form-group row" >
<br>

{!!Form::hidden('valuacion_id',$valuacion->id,null)!!}
{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
