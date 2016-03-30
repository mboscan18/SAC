<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('num','Empresa del Firmante:')!!}
		{!!Form::select('empresa',array(
										null => 'Seleccione la Empresa del Firmante',
										1 => $contrato->proyecto->empresa->nombre_Empresa, 
										2 => $contrato->empresaProveedor->nombre_Empresa),null,['class'=>'form-control']
									)!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('fecha_ini','Firmante:')!!}
		<select class="form-control" name="firmantes_id" id="" onchange="">
            <option  value="null">Seleccione un Firmante</option>
            @foreach($firmantes as $option)
                <option  value="{{$option->id}}">
                    {{$option->nombre}} {{$option->apellido}}
                </option>
            @endforeach 
        </select>
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('num','Acción del Firmante sobre las Valuaciones:')!!}
		{!!Form::text('accion',null,['class'=>'form-control','placeholder'=>'Indique la Acción que tendrá el Firmante sobre las Valuaciones'])!!}
	</div>
</div>

<div class="form-group row" >
<br>

{!!Form::hidden('contrato_id',$contrato->id,null)!!}
{!!Form::hidden('id',null,null)!!}