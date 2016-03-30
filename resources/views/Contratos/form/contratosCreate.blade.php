<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Numero de Contrato:')!!}
		{!!Form::text('nro_Contrato',null,['class'=>'form-control','placeholder'=>'Ingrese el numero del Contrato', 'autofocus'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cc','Empresa Contratista:')!!}
		<div class="col-lg-12 col-md-12 col-sm-12"></div>
		<div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
		{!!Form::select('empresa_Proveedor',$empresas,null,['class'=>'form-control'])!!}
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/Empresas/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Empresa" data-placement="bottom" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i>
	      	</a>
	      	<?php
	        	Session::put('origen',3);
	        ?>	
		</div>
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Moneda del Contrato:')!!}
		
        <select class="form-control" name="moneda_contrato" id="moneda">
            	<option  value="">
            		Seleccione una moneda para el Contrato
            	</option>
            @foreach($monedas as $option)
            	<option  value="{{$option->id}}">
            		{{$option->country}} ({{$option->symbol}})
            	</option>
            @endforeach
        </select>
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_presupuesto','Fecha de firma de la Orden de Servicio:')!!}
		{!!Form::date('fecha_firma',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_ini','Fecha Inicio Contrato:')!!}
		{!!Form::date('fecha_inicio',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_fin','Fecha Fin Contrato:')!!}
		{!!Form::date('fecha_fin',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('estado','Estado del Contrato:')!!}
		{!!Form::select('estado_Contrato',array(
										'Activo' => 'Activo', 
										'Finalizado' => 'Finalizado'),null,['class'=>'form-control']
									)!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Descripción del Contrato:')!!}
		{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la descripción del Contrato', 'rows'=>'2'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('num','Observaciones del Contrato (Opcional):')!!}
		{!!Form::textarea('observaciones',null,['class'=>'form-control','placeholder'=>'Estas observaciones serán colocadas en la Orden de Servicio', 'rows'=>'4'])!!}
	</div>
</div>

<br>

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('cod_Proyecto',$proyecto->id,null)!!}