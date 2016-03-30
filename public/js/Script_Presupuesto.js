// Scripts de la ventana Anticipo
jQuery(document).ready(function(){

    var precio_Unitario = $('#precio_Unitario').val();
    var cantidad = $('#cantidad').val();
    calcularMontoTotal(precio_Unitario, cantidad);

    $('#precio_Unitario').bind('change keydown keyup',function(){
        var precio_Unitario = this.value;
        var cantidad = $('#cantidad').val();
        calcularMontoTotal(precio_Unitario,cantidad);
    });  

    $('#cantidad').bind('change keydown keyup',function(){
        var precio_Unitario = $('#precio_Unitario').val();
        var cantidad = this.value;
        calcularMontoTotal(precio_Unitario, cantidad);
    });

    var precio_Unitario = $('#precio_UnitarioEdit').val();
    var cantidad = $('#cantidadEdit').val();
    calcularMontoTotalEdit(precio_Unitario, cantidad);



    $('#precio_UnitarioEdit').bind('change keydown keyup',function(){
        var precio_Unitario = this.value;
        var cantidad = $('#cantidadEdit').val();
        calcularMontoTotalEdit(precio_Unitario,cantidad);
    });  

    $('#cantidadEdit').bind('change keydown keyup',function(){
        var precio_Unitario = $('#precio_UnitarioEdit').val();
        var cantidad = this.value;
        calcularMontoTotalEdit(precio_Unitario, cantidad);
    });


if($('#sw').val() == "1"){
    $('#editarPartida').modal('show'); 
}


    $('#botonAddPartida').click();
});

function calcularMontoTotal(precio, cant)
{
    if( !$('#precio_Unitario').val() || !$('#cantidad').val() ){
        $('#monto_Total').val("");
    }
    var monto = precio * cant;
    $('#monto_Total_hidden').val(monto);
    $('#monto_Total').val(monto.formatMoney(2, ',', '.'));
}

function calcularMontoTotalEdit(precio, cant)
{
    if( !$('#precio_UnitarioEdit').val() || !$('#cantidadEdit').val() ){
        $('#monto_TotalEdit').val("");
    }
    var monto = precio * cant;
    console.log(monto);
    $('#monto_TotalEdit_hidden').val(monto);
    $('#monto_TotalEdit').val(monto.formatMoney(2, ',', '.'));
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