<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nro','Numero de Partida:')!!}
		{!!Form::text('nro_Partida',null,['class'=>'form-control','placeholder'=>'Ingrese el Numero de Partida', 'autofocus'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('unid','Unidad:')!!}
		{!!Form::text('unidad',null,['class'=>'form-control','placeholder'=>'Unidad en que se medirá la Partida'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cant','Cantidad:')!!}
		{!!Form::text('cantidad',null,['id'=>'cantidadEdit','class'=>'form-control','placeholder'=>'Cantidad de Unidades a realizar','onkeypress'=>'return justNumbers(event);'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('prec','Precio Unitario:')!!}
		{!!Form::text('precio_Unitario',null,['id'=>'precio_UnitarioEdit', 'class'=>'form-control','placeholder'=>'Precio por Unidad','onkeypress'=>'return justNumbers(event);'])!!}
	</div>
</div>
<div class="row">	
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		
		{!!Form::label('total','Monto Total de la Partida:')!!}
		<div class="input-group">
		  <span class="input-group-addon">{{$contratos->moneda->symbol}}</span>
		  <input id="monto_TotalEdit" name="" type="text" class="form-control"  placeholder="Monto Total de la Partida" disabled style="background-color: #d4e2ed; color: #20374a" onkeypress="calcularMontoTotal(event);">
		{!!Form::hidden('monto_Total',null,['id'=>'monto_TotalEdit_hidden'])!!}
		</div>
	</div>
</div>
<div class="row">

	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('cant','Capitulo de la Partida (Opcional):')!!}
		@if($partida != null)
			@if($partida->capitulo_id == null)
				<select class="form-control" name="capitulo_id" id="capitulo_id">
					<option  value=null >Seleccione un Capítulo</option>
		            @foreach($capitulos as $option)
		                <option  value="{{$option->id}}">
		                    {{$option->Descripcion}}
		                </option>
		            @endforeach
		        </select>
			@else
				<select class="form-control" name="capitulo_id" id="capitulo_id">
		            @foreach($capitulos as $option)
		            	@if($partida->capitulo_id == $option->id)
		                	<option  value="{{$option->id}}">{{$option->Descripcion}}</option>
		                @endif	
		            @endforeach
		            @foreach($capitulos as $option)
		                @if($partida->capitulo_id != $option->id)
		                	<option  value="{{$option->id}}">{{$option->Descripcion}}</option>
		                @endif
		            @endforeach
		            <option  value=null >Ningún Capítulo</option>
		        </select>
			@endif	
		@endif		
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('desc','Descripcion de la Partida:')!!}
		{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la Descripcion de la Partida', 'rows'=>'3', 'style'=>'width: 100%'])!!}
	</div>
</div>
<div class="form-group row" >
<br>
	

{!!Form::hidden('id',$partida->id,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('contrato_id',$contratos->id,null)!!}