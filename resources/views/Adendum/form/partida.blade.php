<div class="col-lg-12 col-md-12 col-sm-12" >	
	<div class="form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a">
		{!!Form::label('periodo','Seleccione la Partida:')!!}
	</div>
  <div class="form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #d4e2ed; color: #20374a; margin-top: -15px; padding-top: 15px">
	<div class="col-lg-3 col-md-3 col-sm-3 round-input">
		<select class="form-control"  name="Partida_id_Seleccionada" id="Partida_id_Seleccionada" onchange="partidaSeleccionadaAdendum()">
            @foreach($partidas as $option)
                <option  value="{{$option->id}}">
                    Partida {{$option->nro_Partida}}
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
		{!!Form::label('periodo','',[ 'id'=>'unidadPartida_Form'])!!}
	</div>
	
	<div class="col-lg-6 col-md-6 col-sm-6 round-input" style="text-align: right">
		{!!Form::label('periodo','Precio Unitario:')!!}
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6" >
		<b>{{$contrato->moneda->symbol}}</b> {!!Form::label('periodo','',[ 'id'=>'precioUnitarioPartida_Form'])!!}
		{!!Form::hidden('hidden',null,['id'=>'precioUnitarioPartida_Hidden'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
		{!!Form::label('periodo','Monto Contratado:')!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" >
		{!!Form::label('cant','',[ 'id'=>'monto_Form'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
		{!!Form::label('periodo','Cantidad Contratada:')!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" >
		{!!Form::label('cant','',[ 'id'=>'cantidad_Form'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
		{!!Form::label('periodo','Cantidad Ejecutada en Valuaciones:')!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6" >
		{!!Form::label('cant','',[ 'id'=>'cantidadEjecutadoPartida_Form'])!!}
		{!!Form::hidden('hidden',null,['id'=>'cantidadEjecutadoPartida_Hidden'])!!}
	</div>

  </div>
</div>

<div id="EnableAgregarDetalle">
	<br>
	<div class=" col-lg-12 col-md-12 col-sm-12">
		<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
			{!!Form::label('cant','Cantidad Nueva:')!!}
			{!!Form::text('cantidad',null,['id'=>'cantidad_Nueva','class'=>'form-control','placeholder'=>'Cantidad de Unidades a realizar','onkeypress'=>'return justNumbers(event);'])!!}
		</div>
		<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input" >
			{!!Form::label('total','Monto Nuevo de la Partida:')!!}
			<div class="input-group">
			  <span class="input-group-addon" id="monto_total_Partida_symbol">{{$contrato->moneda->symbol}}</span>
			  <input id="monto_Total_Partida" name="" type="text" class="form-control"  placeholder="Monto Total Ejecutado" disabled style="background-color: #d4e2ed; color: #20374a" >
				{!!Form::hidden('monto_Total',null,['id'=>'monto_Total_Partida_Hidden'])!!}
			</div>
			<div style="text-align: center;">
				{!!Form::label('total','La Cantidad Nueva no puede ser menor que la Cantidad Ejecutada.',['id'=>'MsjCantPasada',  'class'=>' tam-14'])!!}
			</div>	
		</div>
	</div>
</div>

	<br>

{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('contrato_id',$contrato->id,null)!!}

