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
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {{number_format($resumenValuacion->monto_Valuado, 2, ',','.')}}
			</div> 
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto de IVA:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->monto_IVA, 2, ',','.'))!!} 
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Anticipo de Obra:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->anticipo, 2, ',','.'))!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Adelantos:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->adelantos, 2, ',','.'))!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Descuentos:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label(' ',number_format($resumenValuacion->descuentos, 2, ',','.'))!!}
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
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('',number_format($factura->monto_Total, 2, ',','.'),[ 'id'=>'', 'style'=>'font-weight: bold;'])!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto de Retenciones:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('montoRetenciones_Form',number_format(($montoRetenciones*-1), 2, ',','.'),[ 'id'=>'montoRetenciones_Form'])!!}
			</div>  
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2"></div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<div style="height: 2px; background-color: #182e3f; width: 100%"></div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				<b>Monto Total a Pagar:</b>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('totalPagar_Form',number_format($resumenValuacion->neto_Pagar, 2, ',','.'),[ 'id'=>'totalPagar_Form', 'style'=>'font-weight: bold;'])!!}
			</div>  
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				{!!Form::label('periodo','Monto Pagado:')!!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('montoRetenciones_Form',number_format($resumenValuacion->monto_pagado, 2, ',','.'),[ 'id'=>'montoRetenciones_Form'])!!}
			</div>  
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2"></div>
		<div class="col-lg-8 col-md-8 col-sm-8">
			<div style="height: 2px; background-color: #182e3f; width: 100%"></div>
		</div>
		<div class="row " style="background-color: #95aec2; margin-left: 0px; margin-right: 0px">
			<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
				<b>Monto Restante por Pagar:</b>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6" >
				<b>{{$valuacion->contrato->moneda->symbol}}</b> {!!Form::label('totalPagar_Form',number_format($resumenValuacion->diferencia_pago, 2, ',','.'),[ 'id'=>'totalPagar_Form', 'style'=>'font-weight: bold;'])!!}
				{!!Form::hidden('totalPagar_Form_hidden',$resumenValuacion->diferencia_pago,['id'=>'totalPagar_Form_hidden'])!!}
			</div>  
		</div>
	</div> 
</div> 

<div class="col-lg-12 col-md-12 col-sm-12" ><br></div>

<div class="row">

	<div class="col-lg-2 col-md-2 col-sm-2" ></div>
	<div class="form-group col-lg-8 col-md-8 col-sm-8 round-input" >
		{!!Form::label('total','Monto del Pago:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="monto_total_Moneda">{{$valuacion->contrato->moneda->symbol}}</span>
		  <input id="monto_Total" value="{{$pago->monto_Pago}}" name="monto_Pago" type="text" class="form-control" autofocus placeholder="Monto del Pago" style="background-color: #d4e2ed; color: #20374a" >
		</div>
		<div style="text-align: center;">
			{!!Form::label('total','El monto del pago no puede ser mayor que el Monto Restante por Pagar.',['id'=>'MsjCantPasada',  'class'=>' tam-14'])!!}
		</div>	
	</div>

</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('id','Nro de Comprobante:')!!}
		{!!Form::text('nroComprobante',null,['class'=>'form-control','placeholder'=>'Ingrese el Numero del Comprobante de Pago'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input" style="padding-left: 15px;">
		{!!Form::label('periodo','Fecha de Emision del Pago:')!!}
		{!!Form::date('fechaEmision',$valuacion->fecha_Pago,['class'=>'form-control', 'placeholder'=>'Fecha de Pago'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Tipo de Pago:')!!}
		
        <div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
			<select class="form-control" name="tiposPago_id" id="moneda">
	           	@foreach($tiposPago as $option)
	            	@if($pago->tiposPago_id == $option->id)
	                	<option  value="{{$option->id}}">
	            			{{$option->descripcion}}
	                	</option>
	                @endif	
	            @endforeach
	            @foreach($tiposPago as $option)
	                @if($pago->tiposPago_id != $option->id)
	                	<option  value="{{$option->id}}">
	            			{{$option->descripcion}}
	                	</option>
	                @endif
	            @endforeach
	        </select>
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/TiposPago/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Tipo de Pago" data-placement="right" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen_tipoPago',2);
	        ?>	
		</div>
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Eliga la cuenta a la cual realizó el Pago:')!!}
		<div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
			<select class="form-control" name="datosBancarios_id" id="moneda">
            @foreach($datosBancarios as $option)
            	@if($pago->datosBancarios_id == $option->id)
                	<option  value="{{$option->id}}">
        				{{$option->nombreContacto}} | {{$option->banco->nombreBanco}} | {{$option->nroCuentaBancario}}
                	</option>
                @endif	
            @endforeach
            @foreach($datosBancarios as $option)
                @if($pago->datosBancarios_id != $option->id)
                	<option  value="{{$option->id}}">
        				{{$option->nombreContacto}} | {{$option->banco->nombreBanco}} | {{$option->nroCuentaBancario}}
                	</option>
                @endif
            @endforeach
        </select>
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/DatosBancarios/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Contacto Bancario" data-placement="right" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen_DatosBancarios',2);
	        ?>	
		</div>
        
	</div>
</div>

<?php Session::put('valuacion',$valuacion->id); ?>
{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('factura_id',$factura->id,null)!!}