jQuery(document).ready(function(){


   $('#cantidad_Realizada').bind('change keydown keyup',function(){
	    var precio_Unitario = $('#precioUnitarioPartida_Form_hidden').val() * 1;
	    var cantidad = this.value * 1;
	    calcularMontoTotalDetalle(precio_Unitario, cantidad);
	    
    });

   $('#cantidad_Realizada_EDIT').bind('change keydown keyup',function(){
	    var precio_Unitario = $('#precioUnitarioPartida_Form_hidden_EDIT').val() * 1;
	    var cantidad = this.value * 1;
	    calcularMontoTotalDetalleEdit(precio_Unitario, cantidad);
	    
    });	

	partidaSeleccionada();
	partidaSeleccionadaEdit();

	$('#MsjCantPasada').css('display', 'none');
	$('#MsjCantPasada_EDIT').css('display', 'none');



	if($('#sw').val() == "1"){
	    $('#detalleEdit').modal('show'); 
	}

    if($('#ErrorsRequest').val() == "1"){
        $('#boletin').modal('show'); 
    }

	var precio_Unitario = $('#precioUnitarioPartida_Form_hidden_EDIT').val() * 1;
    var cantidadFaltante = $('#cantidadFaltantePartida_Form_hidden_EDIT').val() * 1;
    var cantidad = $('#cantidad_Realizada_EDIT').val() * 1;
	calcularMontoTotalDetalleEdit(precio_Unitario, cantidad);
});	



function calcularMontoTotalDetalle(precio, cant)
{
    if( !$('#precioUnitarioPartida_Form_hidden').val() || !$('#cantidad_Realizada').val() ){
        $('#monto_Total_Detalle').val("");
        $('#monto_Total_Detalle_hidden').val("");
    }
    var monto = precio * cant;
    $('#monto_Total_Detalle_hidden').val(monto);
    $('#monto_Total_Detalle').val(monto.formatMoney(2, ',', '.'));

	var cantidadFaltante = $('#cantidadFaltantePartida_Form_hidden').val() * 1;
    
    if(cant > cantidadFaltante){
        $('#monto_Total_Detalle').css('background-color','#e29e9e');
        $('#monto_total_Detalle_Moneda').css('background-color','#ffcdcd');
        $('#MsjCantPasada').css('display', 'block');
    }else{
        $('#monto_Total_Detalle').css('background-color','#d4e2ed');
        $('#monto_total_Detalle_Moneda').css('background-color','#f3f3f3');
        $('#MsjCantPasada').css('display', 'none');
    }
}

function calcularMontoTotalDetalleEdit(precio, cant)
{
    if( !$('#precioUnitarioPartida_Form_hidden_EDIT').val() || !$('#cantidad_Realizada_EDIT').val() ){
        $('#monto_Total_Detalle_EDIT').val("");
        $('#monto_Total_Detalle_hidden_EDIT').val("");
    }
    var monto = precio * cant;
    $('#monto_Total_Detalle_hidden_EDIT').val(monto);
    console.log(monto);
    $('#monto_Total_Detalle_EDIT').val(monto.formatMoney(2, ',', '.'));

	var cantidadFaltante = $('#cantidadFaltantePartida_Form_hidden_EDIT').val() * 1;
    
    if(cant > cantidadFaltante){
        $('#monto_Total_Detalle_EDIT').css('background-color','#e29e9e');
        $('#monto_total_Detalle_Moneda_EDIT').css('background-color','#ffcdcd');
        $('#MsjCantPasada_EDIT').css('display', 'block');
    }else{
        $('#monto_Total_Detalle_EDIT').css('background-color','#d4e2ed');
        $('#monto_total_Detalle_Moneda_EDIT').css('background-color','#f3f3f3');
        $('#MsjCantPasada_EDIT').css('display', 'none');
    }
}


function partidaSeleccionada()
{
    var precio_Unitario = $('#precioUnitarioPartida_Form_hidden').val() * 1;
    var cantidad = $('#cantidad_Realizada').val('') * 1;
    calcularMontoTotalDetalleEdit(precio_Unitario, cantidad);
    var cant = $('#CantidadElementos_cantDisponible').val();
    var cantidad_actual = $('#cantidad_actual').val();
    var partida_actual = $('#Partida_actual').val();
    var sw = -1;
    var t1,t2,t3;
    for (var i = 0; i < cant; i++) {
        t2 = $('#Partida_id_Seleccionada').val();
        t = $('#idPartida_'+t2).val();
        if(t == t2){
            $('#EnableAgregarDetalle').css('display', 'block');
            $('#EnableMessageDetalleUnable').css('display', 'none');
            $('#submitAddDetalle').css('display', 'block');
            $('#submitAddDetalleDisabel').css('display', 'none');
            $('#descripcionPartida_Form').text($('#descripcionPartida_'+t2).val());
            $('#unidadPartida_Form').text($('#unidadPartida_'+t2).val());

            var cant = $('#cantidadFaltantePartida_'+t2).val() * 1;
            $('#cantidadFaltantePartida_Form_hidden').val(cant);
            $('#cantidadFaltantePartida_Form').text(cant.formatMoney(2, ',', '.'));
            $('#cant_MAX').val(cant);

            var precio = $('#precioUnitarioPartida_'+t2).val() * 1;
            $('#precioUnitarioPartida_Form_hidden').val(precio);
            $('#precioUnitarioPartida_Form').text(precio.formatMoney(2, ',', '.'));

           	var monto = $('#montoFaltantePartida_'+t2).val() * 1;
            $('#montoFaltantePartida_Form_hidden').val(monto);
            $('#montoFaltantePartida_Form').text(monto.formatMoney(2, ',', '.'));


            if($('#cantidadFaltantePartida_Form_hidden').val() == 0){
                $('#EnableAgregarDetalle').css('display', 'none');
                $('#EnableMessageDetalleUnable').css('display', 'block');
                $('#submitAddDetalle').css('display', 'none');
                $('#submitAddDetalleDisabel').css('display', 'block');
            }

            if (partida_actual == t2) {
                $('#cantidad_Realizada').val(cantidad_actual) * 1;
                cantidad = $('#cantidad_Realizada').val() * 1;
                console.log('cant: '+cantidad);
                console.log('precio: '+precio);
                
                calcularMontoTotalDetalle(precio, cantidad);
            }
        }
    }

}  

function partidaSeleccionadaEdit()
{
	var precio_Unitario = $('#precioUnitarioPartida_Form_hidden_EDIT').val() * 1;
	var cantidad = $('#cantidad_Realizada_EDIT').val('') * 1;
	calcularMontoTotalDetalleEdit(precio_Unitario, cantidad);
    var cant = $('#CantidadElementos_cantDisponible').val();
    var cantidad_actual = $('#cantidad_actual_EDIT').val();
    var partida_actual = $('#Partida_actual_EDIT').val();
    var sw = -1;
    var t1,t2,t3;
    for (var i = 0; i < cant; i++) {
        t2 = $('#Partida_id_Seleccionada_EDIT').val();
        t = $('#idPartida_'+t2+'_edit').val();
        if(t == t2){
            $('#EnableAgregarDetalle_EDIT').css('display', 'block');
            $('#EnableMessageDetalleUnable_EDIT').css('display', 'none');
            $('#submitAddDetalle_EDIT').css('display', 'block');
            $('#submitAddDetalleDisabel_EDIT').css('display', 'none');
            $('#descripcionPartida_Form_EDIT').text($('#descripcionPartida_'+t2+'_edit').val());
            $('#unidadPartida_Form_EDIT').text($('#unidadPartida_'+t2+'_edit').val());

            var cant = $('#cantidadFaltantePartida_'+t2+'_edit').val() * 1;
            $('#cantidadFaltantePartida_Form_hidden_EDIT').val(cant);
            $('#cantidadFaltantePartida_Form_EDIT').text(cant.formatMoney(2, ',', '.'));
            $('#cant_MAX_EDIT').val(cant);

            var precio = $('#precioUnitarioPartida_'+t2+'_edit').val() * 1;
            $('#precioUnitarioPartida_Form_hidden_EDIT').val(precio);
            $('#precioUnitarioPartida_Form_EDIT').text(precio.formatMoney(2, ',', '.'));

           	var monto = $('#montoFaltantePartida_'+t2+'_edit').val() * 1;
            $('#montoFaltantePartida_Form_hidden_EDIT').val(monto);
            $('#montoFaltantePartida_Form_EDIT').text(monto.formatMoney(2, ',', '.'));


            if($('#cantidadFaltantePartida_Form_hidden_EDIT').val() == 0){
                $('#EnableAgregarDetalle_EDIT').css('display', 'none');
                $('#EnableMessageDetalleUnable_EDIT').css('display', 'block');
                $('#submitAddDetalle_EDIT').css('display', 'none');
                $('#submitAddDetalleDisabel_EDIT').css('display', 'block');
            }

            if (partida_actual == t2) {
	        	$('#cantidad_Realizada_EDIT').val(cantidad_actual) * 1;
	        	cantidad = $('#cantidad_Realizada_EDIT').val() * 1;
			    console.log('cant: '+cantidad);
			    console.log('precio: '+precio);
	        	
	        	calcularMontoTotalDetalleEdit(precio, cantidad);
	        }
        }
    }

}   


Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };