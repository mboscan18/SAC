<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Numero de Contrato:')!!}
		{!!Form::text('nro_Contrato',null,['class'=>'form-control','placeholder'=>'Ingrese el numero del Contrato', 'autofocus'])!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('cc','Empresa Contratista:')!!}
		{!!Form::select('empresa_Proveedor',$empresas,null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Moneda del Contrato:')!!}
		
        <select class="form-control" name="moneda_contrato" id="moneda">
            @foreach($monedas as $option)
            	@if($contratos->moneda_contrato == $option->id)
                	<option  value="{{$option->id}}">{{$option->country}} ({{$option->symbol}})</option>
                @endif	
            @endforeach
            @foreach($monedas as $option)
                @if($contratos->moneda_contrato != $option->id)
                	<option  value="{{$option->id}}">{{$option->country}} ({{$option->symbol}})</option>
                @endif
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
<div class="row " >
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input" >
		{!!Form::label('estado','Estado del Contrato:')!!}
		{!!Form::select('estado_Contrato',array(
										'Activo' => 'Activo', 
										'Inactivo' => 'Inactivo'),null,['class'=>'form-control']
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
		{!!Form::textarea('observaciones',null,['class'=>'form-control','placeholder'=>'Estas observaciones serán colocadas en la Orden de Servicio', 'rows'=>'6'])!!}
	</div>
</div>

<br>

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}
{!!Form::hidden('cod_Proyecto',$contratos->proyecto->id,null)!!}