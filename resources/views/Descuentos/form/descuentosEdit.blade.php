<div class="row" style="background-color: #d4e2ed; color: #20374a">	
	<div class="form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a">
		{!!Form::label('periodo','Información del Contrato:')!!}
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12" ></div>

	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Total del Contrato sin Impuestos:')!!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4" >
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($valorContrato, 2, ',', '.'),[ 'id'=>''])!!}
		  {!!Form::hidden('ValorContrato',$valorContrato,['id'=>'ValorContrato_EDIT'])!!}
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2" >
		{!!Form::label('periodo','100 %',[ 'id'=>''])!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Ejecutado en la Valuación:')!!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4" >
		<div id="div_MontoEjecutadoVal"> 
			<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($montoEjecutadoValuacion, 2, ',', '.'),[ 'id'=>''])!!}
		  {!!Form::hidden('montoEjecutadoValuacion',$montoEjecutadoValuacion,['id'=>'montoEjecutadoValuacion_EDIT'])!!}
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2" >
		{!!Form::label('periodo',number_format($porcentajeEjecutadoValuacion, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Amortización de Anticipo en la Valuación:')!!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4" >
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($acumuladoDescuentosAnticipos, 2, ',', '.'),[ 'id'=>''])!!}
		  {!!Form::hidden('acumuladoDescuentosAnticipos',$acumuladoDescuentosAnticipos,['id'=>'acumuladoDescuentosAnticipos_EDIT'])!!}
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2" >
		{!!Form::label('periodo',number_format($porcentajeDescuentosAnticipoValuacion, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Descuentos aplicados en la Valuación:')!!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4" >
		<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($acumuladoDescuentosAdelantos, 2, ',', '.'),[ 'id'=>''])!!}
		  {!!Form::hidden('acumuladoDescuentosAdelantos',$acumuladoDescuentosAdelantos,['id'=>'acumuladoDescuentosAdelantos_EDIT'])!!}
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2" >
		{!!Form::label('periodo',number_format($porcentajeDescuentosAdelantosValuacion, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6"></div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div style="height: 2px; background-color: #182e3f; width: 100%"></div>
			</div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Monto de Valuación Aplicando Descuentos:')!!}
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4">
		<div id="div_MontoEjecutadoValConDescuentos"> 
			<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($montoEjecutadoValuacionConDescuentos, 2, ',', '.'),[ 'id'=>''])!!}
			  {!!Form::hidden('montoEjecutadoValuacionConDescuentos',$montoEjecutadoValuacionConDescuentos,['id'=>'montoEjecutadoValuacionConDescuentos_EDIT'])!!}
		</div>	  
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2" >
		{!!Form::label('periodo',number_format($porcentajeEjecutadoConDescuentos, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
	</div>
	<div id="InformacionAnticipos">
		<br>&nbsp;</br>
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto total Anticipo:')!!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" id="MontoAnticipo">
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($montoAnticipos, 2, ',', '.'),[ 'id'=>''])!!}
				  {!!Form::hidden('montoAnticipos',$montoAnticipos,['id'=>'montoAnticipos_EDIT'])!!}
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2" >
				{!!Form::label('periodo',number_format($montoAnticipos_Porcentaje, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto total Amortizado:')!!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($descuentosAnticipos, 2, ',', '.'),[ 'id'=>''])!!}
				  {!!Form::hidden('descuentosAnticipos',$descuentosAnticipos,['id'=>'descuentosAnticipos_EDIT'])!!}
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2" >
				{!!Form::label('periodo',number_format($descuentosAnticipos_Porcentaje, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6"></div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div style="height: 2px; background-color: #182e3f; width: 100%"></div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Restante por Amortizar:')!!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($diferenciaAnticipos, 2, ',', '.'),[ 'id'=>''])!!}
				  {!!Form::hidden('diferenciaAnticipos',$diferenciaAnticipos,['id'=>'diferenciaAnticipos_EDIT'])!!}
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2" >
				{!!Form::label('periodo',number_format($diferenciaAnticipos_Porcentaje, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
			</div>
	</div>

	<div id="InformacionAdelantos">
		<br>&nbsp;</br>
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto total Adelantado:')!!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" id="MontoAdelanto">
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($montoAdelantos, 2, ',', '.'),[ 'id'=>''])!!}
				  {!!Form::hidden('montoAdelantos',$montoAdelantos,['id'=>'montoAdelantos_EDIT'])!!}
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2" >
				{!!Form::label('periodo',number_format($montoAdelantos_Porcentaje, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto total Descontado:')!!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($descuentosAdelantos, 2, ',', '.'),[ 'id'=>''])!!}
				  {!!Form::hidden('descuentosAdelantos',$descuentosAdelantos,['id'=>'descuentosAdelantos_EDIT'])!!}
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2" >
				{!!Form::label('periodo',number_format($descuentosAdelantos_Porcentaje, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
			</div>


			<div class="col-lg-6 col-md-6 col-sm-6"></div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div style="height: 2px; background-color: #182e3f; width: 100%"></div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Saldo total de Adelantos y Descuentos:')!!}
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('periodo',number_format($diferenciaAdelantos, 2, ',', '.'),[ 'id'=>''])!!}
				  {!!Form::hidden('diferenciaAdelantos',$diferenciaAdelantos,['id'=>'diferenciaAdelantos_EDIT'])!!}
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2" >
				{!!Form::label('periodo',number_format($diferenciaAdelantos_Porcentaje, 2, ',',''),[ 'id'=>''])!!} {!!Form::label('periodo','%',[ 'id'=>''])!!}
			</div>
	</div>

</div>
	<br>

<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('estado','Tipo de Descuento:')!!}
		{!!Form::select('tipo_Deduccion',array(
										1 => 'Amortización de Anticipo', 
										2 => 'Descuento'),null,['class'=>'form-control', 'onchange'=>'OpcionSeleccionada_EDIT()', 'id'=>'tipo_Deduccion_EDIT']
									)!!}
	</div>
</div>
<div class="row">	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('periodo','Porcentaje del monto Valuado:',[ 'id'=>''])!!}
		<div class="input-group">
		  <span class="input-group-addon" id="porcentaje_Anticipo_symbol_EDIT">&nbsp;%&nbsp;</span>
		  <input id="porcentaje_Deduccion_form_EDIT" name="" type="text" class="form-control" onkeypress="return justNumbers(event);" placeholder="Porcentaje a Descontar" style="background-color: #d4e2ed; color: #20374a" >
		  {!!Form::hidden('porcentaje_Deduccion',null,['id'=>'porcentaje_Deduccion_EDIT'])!!}
		</div>
	</div>	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('periodo','Monto del Descuento:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="monto_Anticipo_Moneda_EDIT">{{$valuacion->contrato->moneda->symbol}}</span>
		  <input id="monto_Deduccion_form_EDIT" name="" type="text" class="form-control" onkeypress="return justNumbers(event);" placeholder="Monto a Descontar" style="background-color: #d4e2ed; color: #20374a" >
		  {!!Form::hidden('monto_Deduccion',null,['id'=>'monto_Deduccion_EDIT'])!!}

		</div>
	</div>
	<div style="text-align: center;">
		{!!Form::label('total','El monto a Descontar no puede ser mayor que el monto Ejecutado en la Valuacion.',['id'=>'MsjCantPasada_EDIT',  'class'=>' tam-14'])!!}
	</div>	
</div>

<div class="form-group row" >
<br>


{!!Form::hidden('',$valuacion->contrato->porcentajeAnticipo,['id'=>'porcentajeSugerido_EDIT'])!!}
{!!Form::hidden('valuacion_id',$valuacion->id,null)!!}
{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}