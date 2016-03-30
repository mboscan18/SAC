@if(count($errors) > 0)
	<div class="alert alert-danger alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		<i class="fa fa-exclamation-triangle fa-lg"></i> Se encontraron Errores:
  		<ul>
  			@foreach($errors->all() as $error)
  				<li>{!!$error!!}</li>
  			@endforeach
  		</ul>
  	</div>
  	<input type="hidden" id="ErrorsRequest" value="1">
@endif