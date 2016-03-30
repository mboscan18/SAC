<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Empresa del Firmante:')!!}
		@if( (($cant_MAX_OS - $nroFirmantes_OS[0]) > 0) && (($cant_MAX_OS - $nroFirmantes_OS[1]) > 0))
			{!!Form::select('empresa',array(
								null => 'Seleccione la Empresa del Firmante',
								1 => $contrato->proyecto->empresa->nombre_Empresa, 
								2 => $contrato->empresaProveedor->nombre_Empresa),null,['class'=>'form-control']
							)!!}
  		@elseif((($cant_MAX_OS - $nroFirmantes_OS[0]) <= 0) && (($cant_MAX_OS - $nroFirmantes_OS[1]) > 0))
  			{!!Form::select('empresa',array(
								null => 'Seleccione la Empresa del Firmante',
								2 => $contrato->empresaProveedor->nombre_Empresa),null,['class'=>'form-control']
							)!!}			
  		@elseif((($cant_MAX_OS - $nroFirmantes_OS[0]) > 0) && (($cant_MAX_OS - $nroFirmantes_OS[1]) <= 0))
  			{!!Form::select('empresa',array(
								null => 'Seleccione la Empresa del Firmante',
								1 => $contrato->proyecto->empresa->nombre_Empresa),null,['class'=>'form-control']
							)!!}	
		@endif													
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_ini','Firmante:')!!}
        <div class=" col-lg-11 col-md-11 col-sm-11 " style=" margin-left: -15px; padding-right: 0px">
		<select class="form-control" name="firmantes_id" id="" onchange="">
            <option  value="null">Seleccione un Firmante</option>
            @foreach($firmantes as $option)
                <option  value="{{$option->id}}">
                    {{$option->nombre}} {{$option->apellido}}
                </option>
            @endforeach 
        </select>
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/Firmantes/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Firmante" data-placement="bottom" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen',2);
	        ?>	
		</div>
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('num','Acción del Firmante sobre Órdenes de Servicio:')!!}
		{!!Form::text('accion',null,['class'=>'form-control','placeholder'=>'Indique la Acción que tendrá el Firmante sobre las Órdenes de Servicio'])!!}
	</div>
</div>

<div class="form-group row" >
<br>

{!!Form::hidden('contrato_id',$contrato->id,null)!!}
{!!Form::hidden('id',null,null)!!}
