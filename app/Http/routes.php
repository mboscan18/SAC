<?php

/*
|--------------------------------------------------------------------------
| Rutas del Inicio
|--------------------------------------------------------------------------
*/
/*if (Auth::user()->rol_Usuario == 'administrador'){
    Route::get('/','FontController@Administrador');
}elseif(Auth::user()->rol_Usuario == 'supervisor'){    
    Route::get('/','FontController@Supervisor');
}elseif(Auth::user()->rol_Usuario == 'residente'){  
    Route::get('/','FontController@Residente');
}elseif(Auth::user()->rol_Usuario == 'contador'){  
    Route::get('/','FontController@Contador');
}elseif (!Auth::user()) {*/
	Route::get('/','LogController@index');
//}

Route::get('Logout','LogController@logout');
Route::get('Residente','FontController@Residente');
Route::get('Contador','FontController@Contador');
Route::get('Supervisor','FontController@Supervisor');
Route::get('Administrador','FontController@Administrador');
Route::get('Home','FontController@Home');
Route::resource('Log', 'LogController');

/*
|--------------------------------------------------------------------------
| Rutas de Empresas
|--------------------------------------------------------------------------
*/
Route::get('deleteFileEmpresa/{id}','EmpresasController@deleteFile');
Route::get('EmpresasDeleted', 'EmpresasController@showDeletes');
Route::get('RestoreEmpresa/{id}', 'EmpresasController@restore');
Route::resource('Empresas','EmpresasController');

/*
|--------------------------------------------------------------------------
| Rutas de Usuarios
|--------------------------------------------------------------------------
*/
Route::get('deleteFileUsuario/{id}','UserController@deleteFile');
Route::resource('Usuarios','UserController');

/*
|--------------------------------------------------------------------------
| Rutas de Centros de Costo
|--------------------------------------------------------------------------
*/
Route::resource('CentrosCosto','CentrosCostoController');
Route::get('CentrosCostoDeleted', 'CentrosCostoController@showDeletes');
Route::get('RestoreCentroCosto/{id}', 'CentrosCostoController@restore');

/*
|--------------------------------------------------------------------------
| Rutas de Datos Bancarios
|--------------------------------------------------------------------------
*/
Route::resource('DatosBancarios','DatosBancariosController');
Route::get('DatosBancariosDeleted', 'DatosBancariosController@showDeletes');
Route::get('RestoreDatoBancario/{id}', 'DatosBancariosController@restore');

/*
|--------------------------------------------------------------------------
| Rutas de Bancos
|--------------------------------------------------------------------------
*/
Route::resource('Bancos','BancosController');
Route::get('deleteFileBanco/{id}','BancosController@deleteFile');

/*
|--------------------------------------------------------------------------
| Rutas de Proyectos
|--------------------------------------------------------------------------
*/
Route::resource('Proyectos','ProyectosController');
Route::get('ProyectosUsuario/{user}', 'ProyectosController@showProyectos');
Route::get('OpcionesProyecto/{id_proyecto}', 'ProyectosController@opcionesProyecto');
Route::get('ProyectosDeleted', 'ProyectosController@showDeletes');
Route::get('RestoreProyecto/{id}', 'ProyectosController@restore');
Route::get('ContratosSAC', 'ProyectosController@contratosSac');

/*
|--------------------------------------------------------------------------
| Rutas de Contratos
|--------------------------------------------------------------------------
*/
Route::resource('Contratos','ContratosController');
Route::get('Contrato/{proyecto_id}', 'ContratosController@showContratos');
Route::get('FirmarContrato/{id_contrato}/{lugar}', 'ContratosController@firmarContrato');
Route::get('ResumenContrato/{id_contrato}', 'ContratosController@generarResumenContrato');
Route::get('OpcionesContrato/{id_contrato}', 'ContratosController@opcionesContrato');
Route::get('OrdenDeServicioAdendum/{contrato}/{nroAdendum}', 'ContratosController@generarOrdenServicioAdendum');
Route::get('OrdenDeServicio/{contrato}', 'ContratosController@generarOrdenServicio');
Route::get('OtrosReportes/{id_contrato}', 'ContratosController@otrosReportes');
Route::get('ContratosDeleted', 'ContratosController@showDeletes');
Route::get('RestoreContrato/{id}', 'ContratosController@restore');
Route::get('EliminarFirmadoContrato/{id_contrato}', 'ContratosController@eliminarFirmado');

Route::get('Adendum/{id_contrato}', 'ContratosController@adendumContrato');
Route::get('Adendum/EditContrato/{id_contrato}', 'ContratosController@adendumEditarContrato');
Route::get('Adendum/EditPartida/{id_contrato}', 'ContratosController@adendumEditarPartida');
Route::get('Adendum/CrearPartida/{id_contrato}', 'ContratosController@adendumCrearPartida');

Route::resource('DatosContrato', 'DatosContratoController');
Route::get('ResumenDatosContrato/{id_contrato}', 'DatosContratoController@generarResumenDatosContrato');


/*
|--------------------------------------------------------------------------
| Rutas de Adendum Contratos
|--------------------------------------------------------------------------
*/
Route::resource('AdendumContratos','AdendumController');

/*
|--------------------------------------------------------------------------
| Rutas de Adendum Presupuesto
|--------------------------------------------------------------------------
*/
Route::resource('AdendumPresupuestos','AdendumPresupuestoController');

/*
|--------------------------------------------------------------------------
| Rutas de Presupuestos
|--------------------------------------------------------------------------
*/
Route::resource('Presupuestos','PresupuestosController');
Route::get('Presupuesto/{contrato}', 'PresupuestosController@showPresupuesto');
Route::get('Presupuesto/{contrato}/{idPartida}/editar', 'PresupuestosController@showPresupuestoPartida');

/*
|--------------------------------------------------------------------------
| Rutas de Capitulos
|--------------------------------------------------------------------------
*/
Route::resource('Capitulos','CapitulosController');
Route::get('CapitulosDeleted', 'CapitulosController@showDeletes');
Route::get('RestoreCapitulo/{id}', 'CapitulosController@restore');

/* 
|--------------------------------------------------------------------------
| Rutas de Valuaciones
|-------------------------------------------------------------------------- 
*/
Route::resource('Valuaciones','ValuacionesController');
Route::get('Boletines/{contrato}','ValuacionesController@showValuacion');
Route::get('BoletinValuacion/{id_valuacion}/{tipoReporte}','ValuacionesController@generarBoletinValuacion');
Route::get('ValuacionesDeleted', 'ValuacionesController@showDeletes');
Route::get('RestoreValuacion/{id}', 'ValuacionesController@restore');
Route::get('PagosBoletinValuacion/{idBoletin}','ValuacionesController@pagosBoletin');

Route::get('OpcionesValuacion/{id_valuacion}','ValuacionesController@opcionesValuacion');
Route::get('FirmarValuacion/{id_valuacion}','ValuacionesController@firmarValuacion');

/* 
|--------------------------------------------------------------------------
| Rutas de Detalles de Valuacion
|-------------------------------------------------------------------------- 
*/
Route::resource('DetallesValuacion','DetalleValuacionController');
Route::get('DetalleValuacion/{valuacion}/{id_detalle}','DetalleValuacionController@showDetalle');
Route::get('DetallesValuacionesDeleted', 'DetalleValuacionController@showDeletes');
Route::get('RestoreDetallesValuacion/{id}', 'DetalleValuacionController@restore');

/* 
|--------------------------------------------------------------------------
| Rutas de Anticipos
|-------------------------------------------------------------------------- 
*/
Route::resource('Anticipos','AnticiposController');
Route::get('Anticipo/{idValuacion}','AnticiposController@showAnticipo');
Route::get('AnticiposDeleted', 'AnticiposController@showDeletes');
Route::get('RestoreAnticipos/{id}', 'AnticiposController@restore');

/* 
|--------------------------------------------------------------------------
| Rutas de Descuentos
|-------------------------------------------------------------------------- 
*/
Route::resource('Descuentos','DescuentosController');
Route::get('Descuento/{idValuacion}','DescuentosController@showDescuentos');
Route::get('DescuentosDeleted', 'DescuentosController@showDeletes');
Route::get('RestoreDescuentos/{id}', 'DescuentosController@restore');

/* 
|--------------------------------------------------------------------------
| Rutas de Pagos
|-------------------------------------------------------------------------- 
*/
Route::resource('Pagos','PagosController');
Route::get('CrearPago/{idBoletin}','PagosController@crearPago');
Route::get('PagosPendientes','PagosController@pagosPendientes');
Route::get('PagosProyecto/{idProyecto}','PagosController@pagosProyecto');
Route::get('PagosContrato/{idContrato}','PagosController@pagosContrato');
Route::get('PagosBoletin/{idBoletin}','PagosController@pagosBoletin');
Route::get('deleteFilePago/{id}','PagosController@deleteFile');

/* 
|--------------------------------------------------------------------------
| Rutas de Firmantes 
|-------------------------------------------------------------------------- 
*/
Route::resource('Firmantes','FirmantesController');
Route::get('FirmasContrato/{id_contrato}','FirmantesController@firmasContrato');

/* 
|--------------------------------------------------------------------------
| Rutas de Firmantes sobre Orden de Servicio
|-------------------------------------------------------------------------- 
*/
Route::resource('FirmasOrdenServicio','FirmasOrdenServicioController');

/* 
|--------------------------------------------------------------------------
| Rutas de Firmantes sobre Valuaciones
|-------------------------------------------------------------------------- 
*/
Route::resource('FirmasValuacion','FirmasValuacionController');

/* 
|--------------------------------------------------------------------------
| Rutas de Facturas
|-------------------------------------------------------------------------- 
*/
Route::resource('Facturas','FacturasController');
Route::get('OrdenarPago/{id_valuacion}','FacturasController@ordenarPago');

/* 
|--------------------------------------------------------------------------
| Rutas de Retenciones 
|-------------------------------------------------------------------------- 
*/
Route::resource('Retenciones','RetencionesController');
Route::get('RetencionesContrato/{id_contrato}','RetencionesController@retencionesContrato');

/* 
|--------------------------------------------------------------------------
| Rutas de Retenciones sobre Contrato
|-------------------------------------------------------------------------- 
*/
Route::resource('RetencionesContratos','RetencionesContratoController');

/* 
|--------------------------------------------------------------------------
| Rutas de Retenciones sobre Facturas
|-------------------------------------------------------------------------- 
*/
Route::resource('RetencionesFactura','RetencionesFacturaController');

/* 
|--------------------------------------------------------------------------
| Rutas de Tipos de Cuenta
|-------------------------------------------------------------------------- 
*/
Route::resource('TiposCuenta','TiposCuentaController');

/* 
|--------------------------------------------------------------------------
| Rutas de Tipos de Pago
|-------------------------------------------------------------------------- 
*/
Route::resource('TiposPago','TiposPagoController');



Route::get('pdf', 'PdfController@invoice');

/* 
|--------------------------------------------------------------------------
| Rutas de Session
|-------------------------------------------------------------------------- 
*/
Route::get('FirmantesOrigen/{origen}', function()
{
    return Session::put('origen',$origen);
});