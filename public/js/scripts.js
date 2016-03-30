function initializeJS() {

    //tool tips
    jQuery('.tooltips').tooltip();

    //popovers
    jQuery('.popovers').popover();

    //custom scrollbar
        //for html
    jQuery("html").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '6', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '', zindex: '1000'});
        //for sidebar
    jQuery("#sidebar").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
        // for scroll panel
    jQuery(".scroll-panel").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
    
    //sidebar dropdown menu
    jQuery('#sidebar .sub-menu > a').click(function () {
        var last = jQuery('.sub-menu.open', jQuery('#sidebar'));        
        jQuery('.menu-arrow').removeClass('arrow_carrot-right');
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.menu-arrow').addClass('arrow_carrot-right');            
            sub.slideUp(200);
        } else {
            jQuery('.menu-arrow').addClass('arrow_carrot-down');            
            sub.slideDown(200);
        }
        var o = (jQuery(this).offset());
        diff = 200 - o.top;
        if(diff>0)
            jQuery("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            jQuery("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });

    // sidebar menu toggle
    jQuery(function() {
        function responsiveView() {
            var wSize = jQuery(window).width();
            if (wSize <= 768) {
                jQuery('#container').addClass('sidebar-close');
                jQuery('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                jQuery('#container').removeClass('sidebar-close');
                jQuery('#sidebar > ul').show();
            }
        }
        jQuery(window).on('load', responsiveView);
        jQuery(window).on('resize', responsiveView);
    });

    jQuery('.toggle-nav').click(function () {
        if (jQuery('#sidebar > ul').is(":visible") === true) {
            jQuery('#main-content').css({
                'margin-left': '0px'
            });
            jQuery('#sidebar').css({
                'margin-left': '-180px'
            });
            jQuery('#sidebar > ul').hide();
            jQuery("#container").addClass("sidebar-closed");
        } else {
            jQuery('#main-content').css({
                'margin-left': '180px'
            });
            jQuery('#sidebar > ul').show();
            jQuery('#sidebar').css({
                'margin-left': '0'
            });
            jQuery("#container").removeClass("sidebar-closed");
        }
    });

    //bar chart
    if (jQuery(".custom-custom-bar-chart")) {
        jQuery(".bar").each(function () {
            var i = jQuery(this).find(".value").html();
            jQuery(this).find(".value").html("");
            jQuery(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }

}

jQuery(document).ready(function(){
    initializeJS();

    $('#table_empresas').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Exportar a Excel',
                exportOptions: {
                    columns: [ ':visible' ]
                }
            },
            {
                extend: 'colvis',
                text: 'Ocultar Columnas',
                postfixButtons: [ 
                    {
                        extend: 'colvisRestore', 
                        text: 'Restaurar Columnas'
                    } 
                ]
            }
        ],
        language: 
            {
                "decimal":        "",
                "emptyTable":     "No hay datos disponibles en la tabla",
                "info":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ Registros",
                "infoEmpty":      "Mostrando 0 Registros.",
                "infoFiltered":   "(Filtrado de un total de _MAX_ Registros)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Ver _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": activar ordenamiento ascendente",
                    "sortDescending": ": activar ordenamiento descendiente"
                }
            }
    });

    $('#table_valuacion').DataTable({
        dom: 'Bfrtip',
        buttons: [
        ],
        language: 
            {
                "decimal":        "",
                "emptyTable":     "No hay datos disponibles en la tabla",
                "info":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ Registros",
                "infoEmpty":      "Mostrando 0 Registros.",
                "infoFiltered":   "(Filtrado de un total de _MAX_ Registros)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Ver _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": activar ordenamiento ascendente",
                    "sortDescending": ": activar ordenamiento descendiente"
                }
            }
    });

    $('#table_contrato').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Exportar a Excel',
                exportOptions: {
                    columns: [ ':visible' ]
                }
            },
            {
                extend: 'colvis',
                text: 'Ocultar Columnas',
                postfixButtons: [ 
                    {
                        extend: 'colvisRestore', 
                        text: 'Restaurar Columnas'
                    } 
                ]
            }
        ],
        language: 
            {
                "decimal":        "",
                "emptyTable":     "No hay datos disponibles en la tabla",
                "info":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ Registros",
                "infoEmpty":      "Mostrando 0 Registros.",
                "infoFiltered":   "(Filtrado de un total de _MAX_ Registros)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Ver _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": activar ordenamiento ascendente",
                    "sortDescending": ": activar ordenamiento descendiente"
                }
            }
    });

    $('#tabla_monedas').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Exportar a Excel',
                exportOptions: {
                    columns: [ ':visible' ]
                }
            },
            {
                extend: 'colvis',
                text: 'Ocultar Columnas',
                postfixButtons: [ 
                    {
                        extend: 'colvisRestore', 
                        text: 'Restaurar Columnas'
                    } 
                ]
            }
        ],
        language: 
            {
                "decimal":        "",
                "emptyTable":     "No hay datos disponibles en la tabla",
                "info":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ Registros",
                "infoEmpty":      "Mostrando 0 Registros.",
                "infoFiltered":   "(Filtrado de un total de _MAX_ Registros)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Ver _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": activar ordenamiento ascendente",
                    "sortDescending": ": activar ordenamiento descendiente"
                }
            }
    });

    $('#table_presupuesto').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: 'Exportar a Excel',
                exportOptions: {
                    columns: [ ':visible' ]
                }
            },
            {
                extend: 'colvis',
                text: 'Ocultar Columnas',
                postfixButtons: [ 
                    {
                        extend: 'colvisRestore', 
                        text: 'Restaurar Columnas'
                    } 
                ]
            }
        ],
        language: 
            {
                "decimal":        "",
                "emptyTable":     "No hay datos disponibles en la tabla",
                "info":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ Registros",
                "infoEmpty":      "Mostrando 0 Registros.",
                "infoFiltered":   "(Filtrado de un total de _MAX_ Registros)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Ver _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron registros coincidentes",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": activar ordenamiento ascendente",
                    "sortDescending": ": activar ordenamiento descendiente"
                }
            }
    });


    
});

function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46) || (keynum == 45))
        console.log("Num");
    else   
        return /\d/.test(String.fromCharCode(keynum));
}



   