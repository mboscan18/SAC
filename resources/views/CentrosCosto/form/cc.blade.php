<div class="row">
	<div class="form-group round-input col-lg-12 col-md-12 col-sm-12">
		{!!Form::label('id','Codigo:')!!}
		{!!Form::text('cod_CC',null,['class'=>'form-control','placeholder'=>'Ingrese el Codigo del Centro de Costo'])!!}
	</div>
	<div class="form-group round-input col-lg-12 col-md-12 col-sm-12">
		{!!Form::label('nombre','Descripcion:')!!}
		{!!Form::text('descripcion_CC',null,['class'=>'form-control','placeholder'=>'Ingrese la Descripcion del Centro de Costo'])!!}
	</div>
</div>
<div class="form-group row" >
	{!!Form::hidden('id',null,null)!!}
	{!!Form::hidden('usuario',Auth::user()->id,null)!!}
</div>