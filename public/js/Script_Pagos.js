jQuery(document).ready(function(){


   $('#monto_Total').bind('change keydown keyup',function(){
        var monto = this.value * 1;
        var maximo = $('#totalPagar_Form_hidden').val() * 1;
	    if(monto > maximo){
            $('#monto_Total').css('background-color','#e29e9e');
            $('#monto_total_Moneda').css('background-color','#ffcdcd');
            $('#MsjCantPasada').css('display', 'block');
        }else{
            $('#monto_Total').css('background-color','#d4e2ed');
            $('#monto_total_Moneda').css('background-color','#f3f3f3');
            $('#MsjCantPasada').css('display', 'none');
        }
	    
    });

   $('#cantidad_Realizada_EDIT').bind('change keydown keyup',function(){
	    
	    
    });	


	$('#MsjCantPasada').css('display', 'none');
	$('#MsjCantPasada_EDIT').css('display', 'none');


});	


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