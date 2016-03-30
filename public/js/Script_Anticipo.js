// Scripts de la ventana Anticipo
jQuery(document).ready(function(){
    $('#porcentaje_Anticipo_form').bind('change keydown keyup',function(){
        var valorContrato = $('#ValorContrato').val() * 1;
        var montoFaltante = $('#montoFaltantePagar').val() * 1;
        var porcentaje = this.value * 1;
        $('#porcentaje_Anticipo').val(porcentaje);

        calcularMontoAnticipo(porcentaje, valorContrato);
        if($('#monto_Anticipo').val() > montoFaltante){
            $('#monto_Anticipo_form').css('background-color','#e29e9e');
            $('#monto_Anticipo_Moneda').css('background-color','#ffcdcd');
            $('#porcentaje_Anticipo_form').css('background-color','#e29e9e');
            $('#porcentaje_Anticipo_symbol').css('background-color','#ffcdcd');
            $('#MsjCantPasada').css('display', 'block');
        }else{
            $('#monto_Anticipo_form').css('background-color','#d4e2ed');
            $('#monto_Anticipo_Moneda').css('background-color','#f3f3f3');
            $('#porcentaje_Anticipo_form').css('background-color','#d4e2ed');
            $('#porcentaje_Anticipo_symbol').css('background-color','#f3f3f3');
            $('#MsjCantPasada').css('display', 'none');
        }
    });

    $('#monto_Anticipo_form').bind('change keydown keyup',function(){
        var valorContrato = $('#ValorContrato').val() * 1;
        var montoFaltante = $('#montoFaltantePagar').val() * 1;
        var monto = this.value * 1;
        $('#monto_Anticipo').val(monto);

        calcularPorcentajeAnticipo(monto, valorContrato);
        if($('#monto_Anticipo').val() > montoFaltante){
            $('#monto_Anticipo_form').css('background-color','#e29e9e');
            $('#monto_Anticipo_Moneda').css('background-color','#ffcdcd');
            $('#porcentaje_Anticipo_form').css('background-color','#e29e9e');
            $('#porcentaje_Anticipo_symbol').css('background-color','#ffcdcd');
            $('#MsjCantPasada').css('display', 'block');
        }else{
            $('#monto_Anticipo_form').css('background-color','#d4e2ed');
            $('#monto_Anticipo_Moneda').css('background-color','#f3f3f3');
            $('#porcentaje_Anticipo_form').css('background-color','#d4e2ed');
            $('#porcentaje_Anticipo_symbol').css('background-color','#f3f3f3');
            $('#MsjCantPasada').css('display', 'none');
        }
    });


    $('#MsjCantPasada').css('display', 'none');
    
});

function calcularMontoAnticipo(porcentaje, valorContrato)
{
    var monto = (porcentaje/100) * valorContrato;
    console.log(monto);
    $('#monto_Anticipo').val(monto);
    $('#monto_Anticipo_form').val(monto.formatMoney(2, ',', '.'));

    if( !$('#porcentaje_Anticipo_form').val()){
        $('#monto_Anticipo_form').val("");
    };
}

function calcularPorcentajeAnticipo(monto, valorContrato)
{
    
    var porcentaje = (monto*100) / valorContrato;
    console.log(porcentaje);
    $('#porcentaje_Anticipo').val(porcentaje);
    $('#porcentaje_Anticipo_form').val(porcentaje.formatMoney(2, ',', '.'));

    if( !$('#monto_Anticipo_form').val()){
        $('#porcentaje_Anticipo_form').val("");
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