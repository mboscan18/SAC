<div class="row" style="background-color: #d4e2ed; color: #20374a">	
	<div class="form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a">
		{!!Form::label('periodo','Seleccione Partida Trabajada:')!!}
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 round-input">
		<select class="form-control" name="partida_id" id="Partida_id_Seleccionada" onchange="partidaSeleccionada()">
            @foreach($partidas as $option)
                <option  value="{{$option->partida_id}}">
                    Partida {{$option->partida->nro_Partida}}
                </option>
            @endforeach 
        </select>
	</div>	
	<div class="col-lg-9 col-md-9 col-sm-9" >
		{!!Form::label('periodo','M:',[ 'id'=>'descripcionPartida_Form'])!!}
		
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12" ></div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Unidad:')!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6" >
		{!!Form::label('periodo','M:',[ 'id'=>'unidadPartida_Form'])!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Cantidad Faltante por Ejecutar:')!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6" >
		{!!Form::label('cant','1.250,00',[ 'id'=>'cantidadFaltantePartida_Form'])!!}
		{!!Form::hidden('cantidadFaltantePartida_Form_hidden',123,['id'=>'cantidadFaltantePartida_Form_hidden'])!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Precio Unitario:')!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6" >
		<b>{{$valuaciones->contrato->moneda->symbol}}</b> {!!Form::label('periodo','3.500,00',[ 'id'=>'precioUnitarioPartida_Form'])!!}
		{!!Form::hidden('precioUnitarioPartida_Form_hidden',123,['id'=>'precioUnitarioPartida_Form_hidden'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
		{!!Form::label('periodo','Monto Faltante por Ejecutar:')!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" >
		<b>{{$valuaciones->contrato->moneda->symbol}}</b> {!!Form::label('cant','1.250,00',[ 'id'=>'montoFaltantePartida_Form'])!!}
		{!!Form::hidden('montoFaltantePartida_Form_hidden',123,['id'=>'montoFaltantePartida_Form_hidden'])!!}
	</div>
</div>

<div id="EnableAgregarDetalle">
	<br>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cc','Centro de Costo:')!!}
		<select class="form-control" name="cc_id" id="cc_id">
			<option  value=null >Seleccione un Centro de Costo</option>
            @foreach($cc as $option)
                <option  value="{{$option->id}}">
                    {{$option->cod_CC}}
                </option>
            @endforeach
        </select>
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cant','Cantidad Realizada:')!!}
		{!!Form::text('cantidad_Realizada',null,['id'=>'cantidad_Realizada','class'=>'form-control','placeholder'=>'Cantidad de Unidades a realizar','onkeypress'=>'return justNumbers(event);'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input" >
		{!!Form::label('total','Monto Total Ejecutado:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="monto_total_Detalle_Moneda">{{$valuaciones->contrato->moneda->symbol}}</span>
		  <input id="monto_Total_Detalle" name="monto" type="text" class="form-control"  placeholder="Monto Total Ejecutado" readonly style="background-color: #d4e2ed; color: #20374a" >
			{!!Form::hidden('monto',123,['id'=>'monto_Total_Detalle_hidden'])!!}
		</div>
		<div style="text-align: center;">
			{!!Form::label('total','La Cantidad Realizada no puede ser mayor que la Cantidad Faltante por Ejecutar.',['id'=>'MsjCantPasada',  'class'=>' tam-14'])!!}
		</div>	
	</div>

</div>
</div>

<div id="EnableMessageDetalleUnable">
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
{!!Form::hidden('cant_MAX',123,['id'=>'cant_MAX'])!!}

