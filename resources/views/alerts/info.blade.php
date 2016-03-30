@if(Session::has('message-info'))
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <span class="glyphicon glyphicon-info-sign tam-17" aria-hidden="true"></span> {{Session::get('message-info')}}
</div>
@endif
@if(Session::has('message-info_OS'))
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <span class="glyphicon glyphicon-info-sign tam-17" aria-hidden="true"></span>  &nbsp; &nbsp;
   {{Session::get('message-info_OS')}} &nbsp; &nbsp;
	<a class="btn btn-info"  data-toggle="modal" data-target="#Informacion">Ver más</a>
   
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Informacion" class="modal fade ">
		    <div class="modal-dialog " role="document">
		        <div class="modal-content">
		            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
		                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
		                <h4 class="modal-title">Información</h4>
		            </div>
		            <div class="modal-body">
		            	<strong>Se recomienda firmar la Orden de Servicio Pendiente.</strong> <br><br>
		            	Si la Orden de Servicio no está firmada no se tiene formalmente un contrato. <br><br>
		                El presupuesto incluido no se ha hecho válido aún. No se pueden crear valuaciones sobre un Presupuesto no Aprobado.   
		                <div class="col-lg-12 col-md-12 col-sm-12"><br></div> 
		            </div>
		                    <div class="modal-footer">
		                    <div class="col-lg-3 col-md-3 col-sm-3"></div> 
		                      <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
		                          <button type="button" class="boton " data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
		                      </div>
		                    </div> 
		                  
		        </div>
		    </div>
		</div>
@endif
@if(Session::has('message-info_adendum'))
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <span class="glyphicon glyphicon-info-sign tam-17" aria-hidden="true"></span>  &nbsp; &nbsp;
   {{Session::get('message-info_adendum')}} &nbsp; &nbsp;
	<a class="btn btn-info"  data-toggle="modal" data-target="#Informacion">Ver más</a>
   
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Informacion" class="modal fade ">
		    <div class="modal-dialog " role="document">
		        <div class="modal-content">
		            <div class="panel-heading" style="background-color: #1a2732; color: #9cd5eb;">
		                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
		                <h4 class="modal-title">Información</h4>
		            </div>
		            <div class="modal-body">
		            	<strong>Se recomienda firmar la Orden de Servicio Pendiente.</strong> <br><br>
		            	Si la Orden de Servicio no está firmada la información introducida en el Adendum no se verá reflejada en las valuaciones posteriores. <br><br>
		                &nbsp; &nbsp; &nbsp;- &nbsp; Las nuevas cantidades No afectarán el faltante por ejecutar del Contrato.<br>
		                &nbsp; &nbsp; &nbsp;- &nbsp; Si se crearon partidas nuevas no podrán ser movidas en la Valuaciones Posteriores.
		                <div class="col-lg-12 col-md-12 col-sm-12"><br></div> 
		            </div>
		                    <div class="modal-footer">
		                    <div class="col-lg-3 col-md-3 col-sm-3"></div> 
		                      <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:center">
		                          <button type="button" class="boton " data-dismiss="modal" style="width:100%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
		                      </div>
		                    </div> 
		                  
		        </div>
		    </div>
		</div>
@endif