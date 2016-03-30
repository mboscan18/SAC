<div class="row" style="background-color: #d4e2ed; color: #20374a">	
	<div class="form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a">
		{!!Form::label('periodo','Seleccione Partida Trabajada:')!!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 round-input">
		<select class="form-control" name="partida_id" id="Partida_id_Seleccionada_EDIT" onchange="partidaSeleccionadaEdit()">
            @if($detalle != null)
	            @foreach($partidas as $option)
	            	@if($detalle->partida_id == $option->partida_id)
	                	<option  value="{{$option->partida_id}}">
	                		Partida {{$option->partida->nro_Partida}}
	                	</option>
	                @endif	
	            @endforeach
	            @foreach($partidas as $option)
	                @if($detalle->partida_id != $option->partida_id)
	                	<option  value="{{$option->partida_id}}">
	                		Partida {{$option->partida->nro_Partida}}
	                	</option>
	                @endif
	            @endforeach
            @endif
        </select>
	</div>	
	<div class="col-lg-9 col-md-9 col-sm-9" >
		{!!Form::label('periodo','M:',[ 'id'=>'descripcionPartida_Form_EDIT'])!!}
		
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12" ></div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Unidad:')!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6" >
		{!!Form::label('periodo','M:',[ 'id'=>'unidadPartida_Form_EDIT'])!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Cantidad Faltante por Ejecutar:')!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6" >
		{!!Form::label('cant','1.250,00',[ 'id'=>'cantidadFaltantePartida_Form_EDIT'])!!}
		{!!Form::hidden('cantidadFaltantePartida_Form_hidden_EDIT',123,['id'=>'cantidadFaltantePartida_Form_hidden_EDIT'])!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Precio Unitario:')!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6" >
		<b>{{$valuaciones->contrato->moneda->symbol}}</b> {!!Form::label('periodo','3.500,00',[ 'id'=>'precioUnitarioPartida_Form_EDIT'])!!}
		{!!Form::hidden('precioUnitarioPartida_Form_hidden_EDIT',123,['id'=>'precioUnitarioPartida_Form_hidden_EDIT'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
		{!!Form::label('periodo','Monto Faltante por Ejecutar:')!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" >
		<b>{{$valuaciones->contrato->moneda->symbol}}</b> {!!Form::label('cant','1.250,00',[ 'id'=>'montoFaltantePartida_Form_EDIT'])!!}
		{!!Form::hidden('montoFaltantePartida_Form_hidden_EDIT',123,['id'=>'montoFaltantePartida_Form_hidden_EDIT'])!!}
	</div>
</div>

<div id="EnableAgregarDetalle_EDIT">
	<br>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cc','Centro de Costo:')!!}
            @if($detalle != null)
				@if($detalle->cc_id == null)
					<select class="form-control" name="cc_id" id="cc_id_edit">
						<option  value=null >Seleccione un Centro de Costo</option>
			            @foreach($cc as $option)
			                <option  value="{{$option->id}}">
			                    {{$option->cod_CC}}
			                </option>
			            @endforeach
			        </select>
				@else
					<select class="form-control" name="cc_id" id="cc_id_edit">
			            @foreach($cc as $option)
			            	@if($detalle->cc_id == $option->id)
			                	<option  value="{{$option->id}}">{{$option->cod_CC}}</option>
			                @endif	
			            @endforeach
			            @foreach($cc as $option)
			                @if($detalle->cc_id != $option->id)
			                	<option  value="{{$option->id}}">{{$option->cod_CC}}</option>
			                @endif
			            @endforeach
			            <option  value=null >Ningún Centro de Costo</option>
			        </select>
				@endif	
			@endif
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cant','Cantidad Realizada:')!!}
		{!!Form::text('cantidad_Realizada',null,['id'=>'cantidad_Realizada_EDIT','class'=>'form-control','placeholder'=>'Cantidad de Unidades a realizar','onkeypress'=>'return justNumbers(event);'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input" >
		{!!Form::label('total','Monto Total Ejecutado:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="monto_total_Detalle_Moneda_EDIT">{{$valuaciones->contrato->moneda->symbol}}</span>
		  <input id="monto_Total_Detalle_EDIT"  type="text" class="form-control"  placeholder="Monto Total Ejecutado" readonly style="background-color: #d4e2ed; color: #20374a" >
			{!!Form::hidden('monto',123,['id'=>'monto_Total_Detalle_hidden_EDIT'])!!}
		</div>
		<div style="text-align: center;">
			{!!Form::label('total','La Cantidad Realizada no puede ser mayor que la Cantidad Faltante por Ejecutar.',['id'=>'MsjCantPasada_EDIT',  'class'=>' tam-14'])!!}
		</div>	
	</div>

</div>
</div>

<div id="EnableMessageDetalleUnable_EDIT">
	<br><br>
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input" style="text-align: center;">
		{!!Form::label('total','Esta Partida no tiene Cantidades Disponibles por Ejecutar.',['class'=>' tam-16'])!!}
	</div>
	<br><br>
</div>	

<div class="form-group row" >
<br>
{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('valuacion_id',$valuaciones->id,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('cant_MAX',123,['id'=>'cant_MAX_EDIT'])!!}

