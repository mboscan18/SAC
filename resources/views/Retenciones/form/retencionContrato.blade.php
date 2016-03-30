<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('apellido','Seleccione la Retención:')!!}
		<div class="col-lg-11 col-md-11 col-sm-11">
			<select class="form-control" name="retenciones_id" id="retenciones_id_Seleccionada" onchange="">
	            @foreach($retenciones as $option)
	                <option  value="{{$option->id}}">
	                    {{$option->descripcion}} | 
	                    @if($option->tipo == 1)
				        	Aplicable sobre el monto Facturado
				        @else
				        	Aplicable sobre el monto del IVA
				        @endif 
	                </option>
	            @endforeach 
	        </select>
		</div>
		<div class=" col-lg-1 col-md-1 col-sm-1 " style="text-align: left	">
			<a href="{!!URL::to('/Retenciones/create')!!}"  class="  col-lg-12 col-md-12 col-sm-12 icon-reorder tooltips" data-original-title="Crear Retención" data-placement="bottom" style="width:100%; margin-left: -15px; text-align: left;  padding-top: 6px;">
		        <i class="fa fa-plus fa-lg"></i> 
	      	</a>
	      	<?php
	        	Session::put('origen',2);
	        ?>	
		</div>
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('sexo','Porcentaje a Retener:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="">&nbsp;%&nbsp;</span>
		  <input id="" name="porcentaje" type="text" class="form-control"  placeholder="Porcentaje a retener" onkeypress="return justNumbers(event);">
		</div>
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('sexo','Monto Sustraendo:')!!}
		<div class="input-group">
		  <span class="input-group-addon" id="monto_total_Detalle_Moneda">{{$contrato->moneda->symbol}}</span>
		  <input id="" name="sustraendo" type="text" class="form-control"  placeholder="Monto de retención fijo" onkeypress="return justNumbers(event);">
		</div>
	</div>
</div>
<div class="form-group row" >
<br>
	

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('contrato_id',$contrato->id,null)!!}