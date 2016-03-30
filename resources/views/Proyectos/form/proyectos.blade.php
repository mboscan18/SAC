<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cod','Codigo del Proyecto:')!!}
		{!!Form::text('cod_Proyecto',null,['class'=>'form-control','placeholder'=>'Ingrese el codigo del Proyecto'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('nombre','Nombre del Proyecto:')!!}
		{!!Form::text('nombre_Proyecto',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del Proyecto'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
			{!!Form::label('empresa','Empresa Cliente:')!!}
		<div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
		{!!Form::select('empresa_id',$empresas,null,['class'=>'form-control'])!!}
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/Empresas/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Empresa" data-placement="bottom" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen',2);
	        ?>	
		</div>
		 
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('estado','Estado del Proyecto:')!!}
		{!!Form::select('estado_Proyecto',array(
										'Activo' => 'Activo', 
										'Finalizado' => 'Finalizado'),null,['class'=>'form-control']
									)!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('ubicacion','Ubicacion del Proyecto:')!!}
		{!!Form::text('ubicacion_Proyecto',null,['class'=>'form-control','placeholder'=>'Ingresa la descripcion de la Ubicacion'])!!}
	</div>
</div>

<br>

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}