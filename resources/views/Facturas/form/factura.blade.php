<div class="row" style="background-color: white;">
<div class="col-lg-12 col-md-12 col-sm-12">
  <h4 class="">Información sobre el Pago:</h4>
</div>     
<div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
<div class="col-lg-12 col-md-12 col-sm-12" ><br></div>
</div>

<div class="row ">	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input" style="padding-left: 15px;">
		{!!Form::label('periodo','Fecha de Pago:')!!}
		{!!Form::date('fecha_Emision',$valuacion->fecha_Pago,['class'=>'form-control', 'placeholder'=>'Fecha de Pago'])!!}
	</div>	
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input" style="padding-right: 15px">
		{!!Form::label('periodo','Documento Emitido por el Contratista:')!!}
		{!!Form::select('tipo_Factura',array(
				'F' => 'Factura (Movimiento de Partidas)', 
				'R' => 'Recibo (Anticipos y Adelantos)'),null,['class'=>'form-control', 'id'=>'opcionSeleccionada', 'onchange'=>'OpcionSeleccionada();']
			)!!}
	</div>	
</div> 
<div class="row " style="background-color: white;"><br></div>
<div class="row" style="background-color: white;">
<div class="col-lg-12 col-md-12 col-sm-12">
  <h4 class="">Retenciones a aplicar sobre el Boletín:</h4>
</div>     
<div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
<div class="col-lg-12 col-md-12 col-sm-12" ><br></div>
</div>
	<?php 
		$cantRetenciones = sizeof($retencionesContrato);
		$i = 0;
	?>
	@if($cantRetenciones == 0)
  		<div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center">
  			No tiene Retenciones Cargadas para este Contrato.<br><br>
			<div class="col-lg-3 col-md-3 col-sm-3 "></div>

			<div class="col-lg-6 col-md-6 col-sm-6 ">
				<a href="{!!URL::to('/RetencionesContrato/'.$valuacion->contrato->id)!!}"  class="boton  col-lg-6 col-md-6 col-sm-6" style="width:100%; text-align: center">
				  <i class="fa fa-arrow-right fa-lg"></i> Ir a Retenciones del Contrato
				</a>
			</div>
  		</div>	
	@endif
	<input type="hidden" id="cantRetenciones" value="{{$cantRetenciones}}">
  	@foreach($retencionesContrato as $retencion)
  
  	<div class="col-lg-12 col-md-12 col-sm-12" id="Retencion2Aplicar_{{$i}}">
  		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="row " style="background-color: #ecf1f5; color: #20374a; margin-top: 20px">
				<div class=" form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #d4e2ed; color: #20374a">
					<label>
						<input class="checkboxBIG" type="checkbox" name="retenciones[]" value="{{$retencion->retenciones_id}}" id="retencion_{!!$i!!}" checked>
						&nbsp; &nbsp; &nbsp; {{$retencion->retencion->descripcion}} | 
		                    @if($retencion->retencion->tipo == 1)
					        	Aplicable sobre el monto Facturado
					        @else
					        	Aplicable sobre el monto del IVA
					        @endif 
					</label>
				</div>
				<div class="">
						<div class="form-group col-lg-3 col-md-3 col-sm-3 round-input">
							{!!Form::label('sexo','Porcentaje a Retener:')!!}
							<div class="input-group">
							  <span class="input-group-addon" id="">&nbsp;%&nbsp;</span>
							  <input id="porcentaje_{!!$i!!}" name="porcentaje[]" value="{{$retencion->porcentaje}}" type="text" class="form-control"  placeholder="Porcentaje a retener" onkeypress="return justNumbers(event);">
							</div>
						</div>
						<div class="form-group col-lg-3 col-md-3 col-sm-3 round-input">
							{!!Form::label('sexo','Monto Sustraendo:')!!}
							<div class="input-group">
							  <span class="input-group-addon" id="monto_total_Detalle_Moneda">{{$contrato->moneda->symbol}}</span>
							  <input id="sustraendo_{!!$i!!}" name="sustraendo[]" value="{{$retencion->sustraendo}}" type="text" class="form-control"  placeholder="Monto de retención fijo" onkeypress="return justNumbers(event);">
							</div>
						</div>
						<div class="form-group col-lg-5 col-md-5 col-sm-5 round-input">
							{!!Form::label('sexo','Monto del Pago a Retener:')!!}
							<div class="input-group">
							  <span class="input-group-addon" id="monto_total_Detalle_Moneda">{{$contrato->moneda->symbol}}</span>
							  <input id="montoRetenido_{{$i}}"  value="" type="text" class="form-control"  placeholder="Monto a Retener" readonly style="background-color: white">
								
        						<input type="hidden" name="monto_Retenido[]" id="montoRetenido_{!!$i!!}_hidden" value="123">
        						<input type="hidden" id="tipoRetencion_{!!$i!!}" value="{!!$retencion->retencion->tipo!!}">

							</div>
						</div>
						<div class="checkbox col-lg-1 col-md-1 col-sm-1" id="estado_OK{!!$i!!}">
							<br>
							<span class="glyphicon glyphicon-ok tam-20" style="margin-top: -3px;color: #6a954d;"></span>
						</div>
						<div class="checkbox col-lg-1 col-md-1 col-sm-1" id="estado_NOK{!!$i!!}">
							<br>
							<span class="glyphicon glyphicon-remove tam-20" style="margin-top: -3px;color: #d04a4a;"></span>
						</div>
				</div> 
			</div> 
  		</div>
  	</div>
  	<?php $i++; ?>
  	@endforeach	
<div class="row " style="background-color: white;"><br></div>
<div class="row " style="background-color: white;"><br></div>
<div class="row" style="background-color: white;">
<div class="col-lg-12 col-md-12 col-sm-12">
  <h4 class="">Pago del Boletín:</h4>
</div>     
<div style="background-color: #688a7e; height: 16px" class="col-lg-12 col-md-12 col-sm-12"></div>
<div class="col-lg-12 col-md-12 col-sm-12" ><br></div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
  	<div class="row " style="background-color: #d4e2ed; color: #20374a; margin-top: 20px">
		<div class=" form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a">
				Pago del Boletín
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto Ejecutado de Valuación sin IVA:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {{number_format($monto_Valuado, 2, ',','.')}}
				{!!Form::hidden('monto_Valuado',$monto_Valuado,['id'=>'monto_Valuado'])!!}
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto de IVA:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($monto_IVA, 2, ',','.'))!!} 
				{!!Form::hidden('monto_IVA',$monto_IVA,['id'=>'monto_IVA'])!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Anticipo de Obra:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<?php $diferenciaAnticipo = $montoAnticipos - $descuentosAnticipos; ?>
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($diferenciaAnticipo, 2, ',','.'))!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Adelantos:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($montoAdelantos, 2, ',','.'))!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Descuentos:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($descuentosAdelantos, 2, ',','.'))!!}
			</div>  
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2"></div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<div style="height: 2px; background-color: #182e3f; width: 100%"></div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				<b>Total sin Aplicar Retenciones:</b>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('',number_format($monto_Total, 2, ',','.'),[ 'id'=>'', 'style'=>'font-weight: bold;'])!!}

				{!!Form::hidden('total_sin_retenciones',$monto_Total,['id'=>'total_sin_retenciones'])!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto de Retenciones:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('montoRetenciones_Form','3.500,00',[ 'id'=>'montoRetenciones_Form'])!!}
				{!!Form::hidden('montoRetenciones_Form_hidden',123,['id'=>'montoRetenciones_Form_hidden'])!!}
			</div>  
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2"></div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<div style="height: 2px; background-color: #182e3f; width: 100%"></div>
		</div>
		<div class="row " style="background-color: #95aec2; margin-left: 0px; margin-right: 0px">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				<b>Monto Neto a Pagar:</b>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('totalPagar_Form','3.500,00',[ 'id'=>'totalPagar_Form', 'style'=>'font-weight: bold;'])!!}
				{!!Form::hidden('totalPagar_Form_hidden',123,['id'=>'totalPagar_Form_hidden'])!!}
			</div>  
		</div>
	</div> 
</div> 

{!!Form::hidden('valuacion',$valuacion->id,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
<div class="form-group row" >
<br>