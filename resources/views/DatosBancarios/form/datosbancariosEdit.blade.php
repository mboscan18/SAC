 <div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('empresa','Empresa Asociada:')!!}
		<div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
			<select class="form-control" name="empresa_id" id="moneda">
	            @foreach($empresas as $option)
	            	@if($datos->empresa_id == $option->id)
		            	<option  value="{{$option->id}}">
		            		{{$option->nombre_Empresa}}
		            	</option>
	            	@endif
	            @endforeach	
	            @foreach($empresas as $option)
	            	@if($datos->empresa_id != $option->id)
		            	<option  value="{{$option->id}}">
		            		{{$option->nombre_Empresa}}
		            	</option>
	            	@endif
	            @endforeach
	        </select>
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/Empresas/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Empresa" data-placement="right" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen',4);
	        ?>	
		</div>
		 
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('id','Nombre del Banco:')!!}
		<div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
			<select class="form-control" name="banco_id" id="moneda">
	            @foreach($bancos as $option)
	            	@if($datos->banco_id == $option->id)
		            	<option  value="{{$option->id}}">
		            		{{$option->nombreBanco}}
		            	</option>
	            	@endif
	            @endforeach	
	            @foreach($bancos as $option)
	            	@if($datos->banco_id != $option->id)
		            	<option  value="{{$option->id}}">
		            		{{$option->nombreBanco}}
		            	</option>
	            	@endif
	            @endforeach
	        </select>
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/Bancos/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Banco" data-placement="right" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen_banco',2);
	        ?>	
		</div>
		 
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','Nombre del Titular:')!!}
		{!!Form::text('nombreContacto',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre del Titular de la Cuenta'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','RIF o Cédula del Titular:')!!}
		{!!Form::text('identificacionTitular',null,['class'=>'form-control','placeholder'=>'Ingrese el RIF o Cédula del Titular de la Cuenta'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('telefono','Telefono:')!!}
		{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa el Nro de Telefono del Titular'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('email','Email:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Email del Titular'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('empresa','Tipo de Cuenta:')!!}
		<div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
			<select class="form-control" name="tipoCuenta_id" id="moneda">
	            @foreach($tiposCuenta as $option)
	            	@if($datos->tipoCuenta_id == $option->id)
		            	<option  value="{{$option->id}}">
		            		{{$option->descripcion}}
		            	</option>
	            	@endif
	            @endforeach	
	            @foreach($tiposCuenta as $option)
	            	@if($datos->tipoCuenta_id != $option->id)
		            	<option  value="{{$option->id}}">
		            		{{$option->descripcion}}
		            	</option>
	            	@endif
	            @endforeach
	        </select>
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/TiposCuenta/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Tipo de Cuenta" data-placement="right" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen_tipoCuenta',2);
	        ?>	
		</div>
		 
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('id','Nro de Cuenta:')!!}
		{!!Form::text('nroCuentaBancario',null,['class'=>'form-control','placeholder'=>'Ingrese el Codigo de Cuenta', 'maxlength'=>'20', 'onkeypress'=>'return justNumbers(event);'])!!}
	</div>
</div>

<br>

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}           