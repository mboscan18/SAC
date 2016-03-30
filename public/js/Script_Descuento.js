// Scripts de la ventana Descuentos
jQuery(document).ready(function(){
    $('#porcentaje_Deduccion_form').bind('change keydown keyup',function(){
        var montoEjecutado = $('#montoEjecutadoValuacion').val() * 1;
        var porcentaje = this.value * 1;
        $('#porcentaje_Deduccion').val(porcentaje);
        calcularMontoDeduccion(porcentaje, montoEjecutado);
        if($('#monto_Deduccion').val() > montoEjecutado){
            $('#monto_Deduccion_form').css('background-color','#e29e9e');
            $('#monto_Anticipo_Moneda').css('background-color','#ffcdcd');
            $('#porcentaje_Deduccion_form').css('background-color','#e29e9e');
            $('#porcentaje_Anticipo_symbol').css('background-color','#ffcdcd');
            $('#MsjCantPasada').css('display', 'block');
        }else{
            $('#monto_Deduccion_form').css('background-color','#d4e2ed');
            $('#monto_Anticipo_Moneda').css('background-color','#f3f3f3');
            $('#porcentaje_Deduccion_form').css('background-color','#d4e2ed');
            $('#porcentaje_Anticipo_symbol').css('background-color','#f3f3f3');
            $('#MsjCantPasada').css('display', 'none');
        }
    });

    $('#monto_Deduccion_form').bind('change keydown keyup',function(){
        var montoEjecutado = $('#montoEjecutadoValuacion').val() * 1;
        var monto = this.value * 1;
        $('#monto_Deduccion').val(monto.formatMoney(2, '.', ''));
        calcularPorcentajeDeduccion(monto, montoEjecutado);
        if($('#monto_Deduccion').val() > montoEjecutado){
            $('#monto_Deduccion_form').css('background-color','#e29e9e');
            $('#monto_Anticipo_Moneda').css('background-color','#ffcdcd');
            $('#porcentaje_Deduccion_form').css('background-color','#e29e9e');
            $('#porcentaje_Anticipo_symbol').css('background-color','#ffcdcd');
            $('#MsjCantPasada').css('display', 'block');
        }else{
            $('#monto_Deduccion_form').css('background-color','#d4e2ed');
            $('#monto_Anticipo_Moneda').css('background-color','#f3f3f3');
            $('#porcentaje_Deduccion_form').css('background-color','#d4e2ed');
            $('#porcentaje_Anticipo_symbol').css('background-color','#f3f3f3');
            $('#MsjCantPasada').css('display', 'none');
        }
    });


    $('#MsjCantPasada').css('display', 'none');
    OpcionSeleccionada();
    
});

function calcularMontoDeduccion(porcentaje, valorContrato)
{
    var monto = (porcentaje/100) * valorContrato;
    $('#monto_Deduccion').val(monto);
    $('#monto_Deduccion_form').val(monto.formatMoney(2, ',', '.'));

    if( !$('#porcentaje_Deduccion_form').val()){
        $('#monto_Deduccion_form').val("");
    };
}

function calcularPorcentajeDeduccion(monto, valorContrato)
{
    
    var porcentaje = (monto*100) / valorContrato;
    $('#porcentaje_Deduccion').val(porcentaje);
    $('#porcentaje_Deduccion_form').val(porcentaje.formatMoney(2, ',', '.'));

    if( !$('#monto_Deduccion_form').val()){
        $('#porcentaje_Deduccion_form').val("");
    };
    
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
    var opcion = $('#tipo_Deduccion').val();
    if (opcion == 1) {
        $('#InformacionAnticipos').css('display', 'block');
        $('#InformacionAdelantos').css('display', 'none');
        $('#div_MontoEjecutadoVal').css('background-color','#95aec2'); 
        $('#div_MontoEjecutadoValConDescuentos').css('background-color','transparent'); 

        var porcentajeSugerido = $('#porcentajeSugerido').val() * 1;
        $('#porcentaje_Deduccion').val(porcentajeSugerido);
        $('#porcentaje_Deduccion_form').val(porcentajeSugerido.formatMoney(2, ',', '.'));
        calcularMontoDeduccion(porcentajeSugerido,$('#montoEjecutadoValuacion').val())
        
    }else{
        $('#InformacionAnticipos').css('display', 'none');
        $('#InformacionAdelantos').css('display', 'block');
        $('#div_MontoEjecutadoVal').css('background-color','transparent'); 
        $('#div_MontoEjecutadoValConDescuentos').css('background-color','#95aec2'); 

        $('#porcentaje_Deduccion').val(0);
        $('#porcentaje_Deduccion_form').val("");
        calcularMontoDeduccion(0,$('#montoEjecutadoValuacion').val())   
    };    

}
