<div class="row">
	<div class="form-group col-lg-12 col-md-12 col-sm-12 round-input">
		{!!Form::label('nombre','Nombre del Banco:')!!}
		{!!Form::text('nombreBanco',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre del Banco', 'autofocus'])!!}
	</div>
</div>
{!!Form::hidden('id',null,null)!!}
{!!Form::hidden('usuario',Auth::user()->id,null)!!}