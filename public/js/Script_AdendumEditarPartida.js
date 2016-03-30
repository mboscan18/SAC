// Scripts de la ventana Descuentos
jQuery(document).ready(function(){
    $('#cantidad_Nueva').bind('change keydown keyup',function(){
        var cantTrabajada = $('#cantidadEjecutadoPartida_Hidden').val() * 1;
        var precioUnitario = $('#precioUnitarioPartida_Hidden').val() * 1;
        var cantidad = this.value * 1;
        calcularMontoPartida(cantidad, precioUnitario);
        if( $('#cantidad_Nueva').val()){
            if(cantidad < cantTrabajada){
                $('#monto_Total_Partida').css('background-color','#e29e9e');
                $('#monto_total_Partida_symbol').css('background-color','#ffcdcd');
                $('#MsjCantPasada').css('display', 'block');
            }else{
                $('#monto_Total_Partida').css('background-color','#d4e2ed');
                $('#monto_total_Partida_symbol').css('background-color','#f3f3f3');
                $('#MsjCantPasada').css('display', 'none');
            }
        }else{
                $('#monto_Total_Partida').css('background-color','#d4e2ed');
                $('#monto_total_Partida_symbol').css('background-color','#f3f3f3');
                $('#MsjCantPasada').css('display', 'none');
        }
    });

    $('#MsjCantPasada').css('display', 'none');
    partidaSeleccionadaAdendum();
    
});

function calcularMontoPartida(cantidad, precioUnitario)
{
    var monto = cantidad * precioUnitario;
    $('#monto_Total_Partida_Hidden').val(monto);
    $('#monto_Total_Partida').val(monto.formatMoney(2, ',', '.'));

    if( !$('#cantidad_Nueva').val()){
        $('#monto_Total_Partida').val("");
    };
}

 function partidaSeleccionadaAdendum()
{
    var cant = $('#CantidadElementos_cantTrabajada').val();
    var sw = -1;
    var t1,t2,t3;
    for (var i = 0; i < cant; i++) {
        t = $('#idPartida_'+i).val();
        t2 = $('#Partida_id_Seleccionada').val();
            console.log('#idPartida_'+i+' - '+' '+t+' | #Partida_id_Seleccionada - '+t2);
        if(t == t2){

            console.log(t2+' '+t);
            $('#descripcionPartida_Form').text($('#descripcionPartida_'+t2).val());
            $('#unidadPartida_Form').text($('#unidadPartida_'+t2).val());

            var precio = $('#precioUnitarioPartida_'+t2).val() * 1;
            var cant = $('#cantidadTrabajada_'+t2).val() * 1;
            var cantidad = $('#cantidadPartida_'+t2).val() * 1;
            var monto = $('#montoPartida_'+t2).val() * 1;

            $('#monto_Form').text(monto.formatMoney(2, ',', '.'));
            $('#cantidad_Form').text(cantidad.formatMoney(2, ',', '.'));
            $('#precioUnitarioPartida_Form').text(precio.formatMoney(2, ',', '.'));
            $('#precioUnitarioPartida_Hidden').val(precio);

            $('#cantidadEjecutadoPartida_Form').text(cant.formatMoney(2, ',', '.'));
            $('#cantidadEjecutadoPartida_Hidden').val(cant);

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