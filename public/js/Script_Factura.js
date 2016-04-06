// Scripts de la ventana Enviar a Pagar
jQuery(document).ready(function(){
    
    calcularMontoTotal();
    OpcionSeleccionada();

    var cant = $('#cantRetenciones').val() * 1;
    for (var i = 0; i < cant; i++) {

        // Si cambia el estado del CheckBOX
        $('#retencion_'+i).change(function() {
            calcularMontoTotal();
        });

        // Si cambia el porcentaje
        $('#porcentaje_'+i).bind('change keydown keyup',function(){
            calcularMontoTotal();
        });

        // Si cambia el Sustraendo
        $('#sustraendo_'+i).bind('change keydown keyup',function(){
            calcularMontoTotal();
        });
    }
    
});


function calcularMontoTotal()
{
    var totalSinRetenciones = $('#total_sin_retenciones').val() * 1;
    var monto_Valuado = $('#monto_Valuado').val() * 1;
    var monto_IVA = $('#monto_IVA').val() * 1;
    var cant = $('#cantRetenciones').val() * 1;
    var montoTotalRetenciones = 0;
    for (var i = 0; i < cant; i++) {
        var tipoRetencion = $('#tipoRetencion_'+i).val() * 1;
        var porcentaje = $('#porcentaje_'+i).val() * 1;
        var sustraendo = $('#sustraendo_'+i).val() * 1;
        if ($('#retencion_'+i).is(":checked")) {
            if (tipoRetencion == 1) {
                var porc = (monto_Valuado * porcentaje)/100;
            }else{
                var porc = (monto_IVA * porcentaje)/100;
            }
                var montoretencion = porc - sustraendo;
            $('#montoRetenido_'+i+'_hidden').val(montoretencion);
            $('#montoRetenido_'+i).val(montoretencion.formatMoney(2, ',', '.'));

            montoTotalRetenciones = montoTotalRetenciones + montoretencion;
            $('#estado_OK'+i).css('display', 'block');
            $('#estado_NOK'+i).css('display', 'none');
        }else{
            if (tipoRetencion == 1) {
                var porc = (monto_Valuado * porcentaje)/100;
            }else{
                var porc = (monto_IVA * porcentaje)/100;
            }
                var montoretencion = porc + sustraendo;
            $('#montoRetenido_'+i+'_hidden').val(montoretencion);
            $('#montoRetenido_'+i).val(montoretencion.formatMoney(2, ',', '.'));

            $('#estado_OK'+i).css('display', 'none');
            $('#estado_NOK'+i).css('display', 'block');
        }
    }
    $('#montoRetenciones_Form_hidden').val(montoTotalRetenciones);
    $('#montoRetenciones_Form').text((montoTotalRetenciones*-1).formatMoney(2, ',', '.'));
    total_pagar = totalSinRetenciones - montoTotalRetenciones;
    
    console.log("montoTotalRetenciones : "+montoTotalRetenciones+" ");
    console.log("total_pagar : "+total_pagar+" ");

    $('#totalPagar_Form_hidden').val(total_pagar);
    $('#totalPagar_Form').text(total_pagar.formatMoney(2, ',', '.'));

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

 function OpcionSeleccionada()
{
    var opcion = $('#opcionSeleccionada').val();
    var cant = $('#cantRetenciones').val() * 1;
    if (opcion == 'F') {
        for (var i = 0; i < cant; i++) {
            $('#retencion_'+i).prop('checked', true);
        }
        calcularMontoTotal();

       
    }else{
        for (var i = 0; i < cant; i++) {
            $('#retencion_'+i).prop('checked', false);
        }
        calcularMontoTotal();  
    };    

}
