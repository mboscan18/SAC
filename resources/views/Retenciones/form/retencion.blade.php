<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('apellido','Descripción de la Retención:')!!}
		{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la Descripción de la Retención'])!!}
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('sexo','Tipo de Retención:')!!}
		{!!Form::select('tipo',array(
										1 => 'Aplicable sobre el monto Facturado', 
										2 => 'Aplicable sobre el monto del IVA'),null,['class'=>'form-control']
									)!!}
	</div>
	<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input">
		{!!Form::label('sexo','Estatus de la Retención:')!!}
		{!!Form::select('status',array(
										1 => 'Activo', 
										0 => 'Inactivo'),null,['class'=>'form-control']
									)!!}
	</div>
</div>
<div class="form-group row" >
<br>
	

{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}