<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;




//RUTAS
Route::get('/',[WebsiteController::class,'home']);

Route::get('/admin', function () {
    return view('admin.admin');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/panel', function () {
        return view('admin.admin');
    })->name('admin.admin');
});





































//VER IMAGENES
Route::get('/api/getImage/{fileName}', [ImagenController::class, 'getImage']);


//ADMIN


//LOGIN
Route::post('/api/verificarLogin', [UserController::class, 'verify']);
Route::post('/api/verificarLoginZona', [UserController::class, 'verificarLoginZona']);
 
Route::get('/api/obtenerIdUsuario/{idUsuario}', [UserController::class, 'obtenerUsuario']);
Route::get('/api/obtenerIdUsuarioZona/{idUsuario}', [UserController::class, 'obtenerIdUsuarioZona']);

//SLIDER
Route::get('/api/obtenerSliders', [AdminController::class, 'obtenerSliders']);
Route::post('/api/updateSlider', [AdminController::class, 'updateSlider']);
Route::get('/api/obtenerSlider/{idSlider}', [AdminController::class, 'obtenerSlider']);
Route::post('/api/crearSlider', [AdminController::class, 'crearSlider']);
Route::post('/api/deleteSlider', [AdminController::class, 'deleteSlider']);

//CONTACTO
Route::post('/api/updateContacto', [AdminController::class, 'updateContacto']);
Route::get('/api/obtenerContacto', [AdminController::class, 'obtenerContacto']);


//LOGO
Route::post('/api/updateLogo', [AdminController::class, 'updateLogo']);
Route::get('/api/obtenerLogos', [AdminController::class, 'obtenerLogos']);
Route::get('/api/obtenerLogo/{idLogo}', [AdminController::class, 'obtenerLogo']);

//PRODUCTOS
Route::get('/api/obtenerProductos', [ProductosController::class, 'index']);
Route::post('/api/crearProducto', [ProductosController::class, 'crearProducto']);
Route::post('/api/deleteProducto', [ProductosController::class, 'deleteProducto']);
Route::post('/api/updateProducto', [ProductosController::class, 'updateProducto']);
Route::get('/api/obtenerProducto/{idProducto}', [ProductosController::class, 'obtenerProducto']);
Route::post('/api/guardarImagenProducto', [ProductosController::class, 'guardarImagenProducto']);
Route::post('/api/eliminarImagen', [ProductosController::class, 'eliminarImagen']);


//BANNERS
Route::get('/api/obtenerBanner', [AdminController::class, 'obtenerBanner']);
Route::post('/api/updateBanner', [AdminController::class, 'updateBanner']);

//NOVEDADES
Route::get('/api/obtenerNovedades', [AdminController::class, 'obtenerNovedades']);
Route::post('/api/crearNovedad', [AdminController::class, 'crearNovedad']);
Route::post('/api/updateNovedad', [AdminController::class, 'updateNovedad']);
Route::get('/api/obtenerNovedad/{idNovedad}', [AdminController::class, 'obtenerNovedad']);
Route::post('/api/deleteNovedad', [AdminController::class, 'deleteNovedad']);

//FERIAS
Route::get('/api/obtenerFerias', [AdminController::class, 'obtenerFerias']);
Route::post('/api/crearFeria', [AdminController::class, 'crearFeria']);
Route::post('/api/updateFeria', [AdminController::class, 'updateFeria']);
Route::get('/api/obtenerFeria/{idFeria}', [AdminController::class, 'obtenerFeria']);
Route::post('/api/deleteFeria', [AdminController::class, 'deleteFeria']);
Route::post('/api/guardarImagenFeria', [AdminController::class, 'guardarImagenFeria']);
Route::post('/api/eliminarImagenFeria', [AdminController::class, 'eliminarImagenFeria']);

//SERVICIOS
Route::get('/api/obtenerServicios', [AdminController::class, 'obtenerServicios']);
Route::post('/api/deleteServicio', [AdminController::class, 'deleteServicio']);
Route::post('/api/crearServicio', [AdminController::class, 'crearServicio']);
Route::post('/api/updateServicio', [AdminController::class, 'updateServicio']);
Route::get('/api/obtenerServicio/{idNovedad}', [AdminController::class, 'obtenerServicio']);

//DESCARGAS
Route::get('/api/obtenerDescargas', [AdminController::class, 'obtenerDescargas']);
Route::post('/api/deleteDescarga', [AdminController::class, 'deleteDescarga']);
Route::post('/api/crearDescarga', [AdminController::class, 'crearDescarga']);
Route::post('/api/updateDescarga', [AdminController::class, 'updateDescarga']);
Route::get('/api/obtenerDescarga/{idDescarga}', [AdminController::class, 'obtenerDescarga']);


//EMAILS
Route::post('/api/enviarMensajeSub', [EmailsController::class, 'enviarMensajeSub']);
Route::post('/api/agregarSuscripcion', [SuscripcionController::class, 'agregarSuscripcion']);
Route::get('/api/obtenerSuscripciones', [SuscripcionController::class, 'obtenerSuscripciones']);
Route::get('/api/deleteSuscripcion/{idSuscripcion}', [SuscripcionController::class, 'deleteSuscripcion']);

//VALORES
Route::get('/api/obtenerSecciones', [AdminController::class, 'obtenerSecciones']);
Route::post('/api/updateSeccion', [AdminController::class, 'updateSeccion']);
Route::get('/api/obtenerSeccion/{idSeccion}', [AdminController::class, 'obtenerSeccion']);
Route::post('/api/deleteValor', [AdminController::class, 'deleteSeccion']);
Route::post('/api/crearSeccion', [AdminController::class, 'crearSeccion']);

//VIDEOS
Route::get('/api/obtenerVideos', [AdminController::class, 'obtenerVideos']);
Route::post('/api/updateVideo', [AdminController::class, 'updateVideo']);
Route::get('/api/obtenerVideo/{idVideo}', [AdminController::class, 'obtenerVideo']);
Route::post('/api/deleteVideo', [AdminController::class, 'deleteVideo']);
Route::post('/api/crearVideo', [AdminController::class, 'crearVideo']);


//descargas
Route::get('/api/descargarArchive/{idDescarga}', [AdminController::class, 'descargarArchive']);
Route::get('/api/descargarArchiveZona/{idDescarga}', [AdminController::class, 'descargarArchiveZona']);
Route::get('/api/obtenerZona/{idZona}', [AdminController::class, 'obtenerZona']);

//EMAILS
Route::post('/enviarCorreo', [EmailsController::class, 'enviarCorreoContacto']);

//METADATOS
Route::get('/api/obtenerMetadatos', [AdminController::class, 'obtenerMetadatos']);
Route::get('/api/obtenerMetadato/{idMetadato}', [AdminController::class, 'obtenerMetadato']);
Route::post('/api/updateMetadato/', [AdminController::class, 'updateMetadato']);


//usuarios
Route::get('/api/obtenerUsuarios', [UserController::class, 'obtenerUsuarios']);
Route::get('/api/obtenerIdUsuario/{idUsuario}', [UserController::class, 'obtenerUsuario']);
Route::post('/api/updateUsuario', [UserController::class, 'update']);
Route::get('/api/deleteUsuario/{idUsuario}', [UserController::class, 'destroy']);
Route::post('/api/crearUsuario', [UserController::class, 'store']);

//clientes
Route::get('/api/obtenerClientes', [UserController::class, 'obtenerClientes']);

//ZONA PRIVADA
Route::get('/api/obtenerFileZonas', [AdminController::class, 'obtenerFileZonas']);
Route::post('/api/deleteFileZona', [AdminController::class, 'deleteFileZona']);
Route::post('/api/crearFileZona', [AdminController::class, 'crearFileZona']);
Route::post('/api/updateFileZona', [AdminController::class, 'updateFileZona']);
Route::get('/api/obtenerFileZona/{idFileZona}', [AdminController::class, 'obtenerFileZona']);
Route::get('/api/deleteUsuarioZona/{idUsuario}', [UserController::class, 'deleteUsuarioZona']);

//ZONA PRIVADA
Route::post('/api/crearUsuarioZona', [UserController::class, 'crearUsuarioZona']);

//CARGA MASIVA
Route::post('/api/cargarCargaMasiva', [ExcelController::class, 'importExcel']);


//SERVICIOS
Route::get('/api/obtenerCategorias', [AdminController::class, 'obtenerCategorias']);
Route::post('/api/crearCategoria', [AdminController::class, 'crearCategoria']);
Route::post('/api/deleteCategoria', [AdminController::class, 'deleteCategoria']);
Route::post('/api/updateCategoria', [AdminController::class, 'updateCategoria']);
Route::get('/api/obtenerCategoria/{idCategoria}', [AdminController::class, 'obtenerCategoria']);

//SECTORES
Route::get('/api/obtenerSectores', [AdminController::class, 'obtenerSectores']);
Route::post('/api/crearSector', [AdminController::class, 'crearSector']);
Route::post('/api/deleteSector', [AdminController::class, 'deleteSector']);
Route::post('/api/updateSector', [AdminController::class, 'updateSector']);
Route::get('/api/obtenerSector/{idSector}', [AdminController::class, 'obtenerSector']);

//LITROS
Route::get('/api/obtenerLitros', [AdminController::class, 'obtenerLitros']);
Route::get('/api/obtenerLitro/{idLitro}', [AdminController::class, 'obtenerLitro']);
Route::post('/api/crearLitro', [AdminController::class, 'crearLitro']);
Route::post('/api/updateLitro', [AdminController::class, 'updateLitro']);
Route::post('/api/deleteLitro', [AdminController::class, 'deleteLitro']);
