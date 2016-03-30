@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <i class="fa fa-times-circle fa-lg"></i> &nbsp; &nbsp; 
   {{Session::get('message-error')}}
</div>
@endif
@if(Session::has('message-error_valuacion'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <i class="fa fa-times-circle fa-lg"></i> &nbsp; &nbsp; 
   {{Session::get('message-error_valuacion')}} &nbsp; &nbsp; 
   <a href="{!!URL::to('/OpcionesValuacion/'.Session::get('valuacion'))!!}" class="btn btn-danger"  >
		Ir a Valuación
	</a>
</div>
@endif
