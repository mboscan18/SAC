@if(Session::has('message-warning'))
	@if(Session::get('message-warning') == 'firmar-adendum')
		<div class="alert alert-warning alert-dismissible" role="alert" style="height: 65px">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="row col-lg-12 col-md-12 col-sm-12">
				   <i class="fa fa-warning fa-lg"></i> &nbsp; &nbsp; 
				   Tiene una Orden de Servicio Pendiente por Firmar.  &nbsp; &nbsp; 
					<a class="btn btn-warning"  data-toggle="modal" data-target="#firmarOrdenServicio">
						Firmar Orden de Servicio
				   	</a>
			</div>   
		</div>

		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="firmarOrdenServicio" class="modal fade ">
		    <div class="modal-dialog " role="document">
		        <div class="modal-content">
		            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
		                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
		                <h4 class="modal-title">Firmar Orden de Servicio</h4>
		            </div>
		            <div class="modal-body">
		            	<strong>¿Está seguro que quiere firmar la Orden de Servicio?</strong> <br><br>
		            	Los cambios realizados sobre el contrato se harán efectivos.<br><br>
		                Se Recomienda proceder con el firmado de la Orden de Servicio luego de que la misma haya sido firmada físicamente.    
		                <div class="col-lg-12 col-md-12 col-sm-12"><br></div>    
		            </div>
		            <div class="modal-footer">
		            	<div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                            <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                        </div>
                        <a href="{!!URL::to('/FirmarContrato/'.$contrato->id.'/'.Session::get('origen'))!!}" class="boton col-lg-6 col-md-6 col-sm-6" style="">
	                        <div class="" style="text-align: center; width:100%" >
	                            <i class="fa fa-pencil"></i> Firmar
	                        </div>
                        </a>
			      	</div> 
		        </div>
		    </div>
		</div>
	@else
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		   <i class="fa fa-warning fa-lg"></i> &nbsp; &nbsp; {{Session::get('message-warning')}}
		</div>
	@endif
@endif

@if(Session::has('message-warning_2'))
	@if(Session::pull('message-warning_2') == 'firmar-valuacion')
		<div class="alert alert-warning alert-dismissible" role="alert" style="height: 65px">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="row col-lg-12 col-md-12 col-sm-12">
				   <i class="fa fa-warning fa-lg"></i> &nbsp; &nbsp; 
				   Tiene un Boletín Pendiente por enviar a Pagar. &nbsp; &nbsp; 
					<a class="btn btn-warning"  data-toggle="modal" data-target="#firmarValuacion">
						Enviar a pagar Boletín
				   	</a>
			</div>   
		</div>

		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="firmarValuacion" class="modal fade ">
		    <div class="modal-dialog " role="document">
		        <div class="modal-content">
		            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
		                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
		                <h4 class="modal-title">Enviar a Pagar Boletín</h4>
		            </div>
		            <div class="modal-body">
		            	<strong>¿Está seguro que quiere ordenar el Pago de este Boletín?</strong> <br><br>
		            	Al ordenar el pago de un Boletín ya no se permitirá Editar el mismo.<br><br>
		                Se recomienda ordenar el pago del Boletín una vez se hayan realizado las revisiones pertinentes sobre el mismo.    
						
                    </div>
                    <div class="modal-footer">
		            	<div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                            <button type="button" class="boton boton-danger" data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                        </div>
                        <a href="{!!URL::to('/OrdenarPago/'.$valuacion->id)!!}" class="boton col-lg-6 col-md-6 col-sm-6" style="">
	                        <div class="" style="text-align: center; width:100%" >
	                            <i class="fa fa-credit-card"></i> Enviar a Pagar Boletín
	                        </div>
                        </a>
			      	</div> 
		                  
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@endif
