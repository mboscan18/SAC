<div class="row" style="background-color: #d4e2ed; color: #20374a; margin-top: 20px">
	<div class="form-group col-lg-12 col-md-12 col-sm-12" style="background-color: #c1ced8; color: #20374a">
			{!!Form::label('periodo','Información sobre el Pago:')!!}
		</div>
	<div class=" col-lg-12 col-md-12 col-sm-12">	
		<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input" style="padding-left: 15px;">
			{!!Form::label('periodo','Fecha de Pago:')!!}
			{!!Form::date('fecha_Emision',$valuacion->fecha_Pago,['class'=>'form-control', 'placeholder'=>'Fecha de Pago'])!!}
		</div>	
		<div class="form-group col-lg-6 col-md-6 col-sm-6 round-input" style="padding-right: 15px">
			{!!Form::label('periodo','Documento Emitido por el Contratista:')!!}
			{!!Form::select('tipo_Factura',array(
					'F' => 'Factura', 
					'R' => 'Recibo (Sin Impuestos)'),null,['class'=>'form-control']
				)!!}
		</div>	
	</div> 
	{!!Form::hidden('valuacion',$valuacion->id,null)!!}
</div> 
<div class="form-group row" >
<br>