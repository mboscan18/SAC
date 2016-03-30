<div class="row">
	<div class="form-group round-input col-lg-12 col-md-12 col-sm-12">
		{!!Form::label('id','Descripción del Capítulo:')!!}
		{!!Form::text('Descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la Descripción del Capítulo'])!!}
	</div>

</div>	
<div class="form-group row" >
	{!!Form::hidden('id',null,null)!!}
	{!!Form::hidden('usuario',Auth::user()->id,null)!!}
</div>