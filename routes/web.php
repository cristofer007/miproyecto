<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuloForo\ForoController;
use App\Http\Controllers\ModuloUsuarios\UsuariosController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ModuloSolicitudes\SolicitudesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('vistaindex');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/vistaarchivo', [PruebController::class, 'getVistaArchivo'])->name('vistaarchivo');

//

//------------------------------------------------------------------------------
//                  VISTAS.
//------------------------------------------------------------------------------

Route::get('/vistaforo', [ForoController::class, 'getVistaForo'])->name('vistaforo');
Route::get('/vistagestionpersonas', [PersonasController::class, 'getVistaPersonas'])->name('vistagestionpersonas');
Route::get('/vistarespuestas', [SolicitudesController::class, 'getVistaRespuestas']);
Route::get('/vistasolicitud', [SolicitudesController::class, 'getVistaSolicitud']);
Route::get('/vistanuevoticket', [SolicitudesController::class, 'getVistaNuevoTicket']);
Route::get('/vistalogin', [UsuariosController::class, 'getVistaLogin']);

Route::get('/vistaconsultar', [SolicitudesController::class, 'getVistaConsultar']);
Route::get('/vistaadmin', [SolicitudesController::class, 'getVistaAdmin']);
Route::get('/vistaespecialista', [SolicitudesController::class, 'getVistaEspecialista']);
//Route::get('/vistamensajes', [Controller::class, 'getVistaMensajes'])->name('vistamensajes');
        

//Route::get('/prueba', [PruebaController::class, 'prueba']);
//Route::post('/prueba2', [PruebaController::class, 'prueba2']);
//Route::get('/prueba3', [PruebaController::class, 'prueba3']);



//
//------------------------------------------------------------------------------
//                  ACCIONES FORO.
//------------------------------------------------------------------------------
//
Route::post('/escribirpublicacion', [ForoController::class, 'escribirPublicacion']);
Route::get('/eliminarpublicacion/{idGrupo}/{idCanal}/{idPublicacion}', [ForoController::class, 'eliminarPublicacion']);
Route::post('/modificarpublicacion', [ForoController::class, 'modificarPublicacion']);
Route::get('/getpublicaciones/{idCanal}/{id}', [ForoController::class, 'getPublicaciones']);

Route::post('/escribircomentario', [ForoController::class, 'escribirComentario']);
Route::get('/eliminarcomentario/{idComentario}', [ForoController::class, 'eliminarComentario']);
Route::post('/modificarcomentario', [ForoController::class, 'modificarComentario']);
Route::get('/getcomentarios/{idGrupo}/{idCanal}/{idPublicacion}', [ForoController::class, 'getComentarios']);

Route::get('/getnuevapaginapublicaciones', [ForoController::class, 'getNuevaPaginaPublicaciones']);
Route::get('/getpublicaciones', [ForoController::class, 'getPublicaciones']);
//
////------------------------------------------------------------------------------
////                  ACCIONES ADMINISTRADOR.
////------------------------------------------------------------------------------
//
//        
//Route::post('/registrarusuario', [PersonasController::class, 'registrarUsuario']);
//Route::post('/eliminarusuario', [PersonasController::class, 'eliminarUsuario']);        
//Route::post('/compartirrecurso', [RecursosController::class, 'compartirRecurso']);
//Route::post('/eliminarrecurso', [RecursosController::class, 'eliminarRecurso']);
//Route::post('/modificarrecurso', [RecursosController::class, 'modificarRecurso']);
//Route::post('/solicitarrecurso', [RecursosController::class, 'solicitarRecurso']);
//Route::post('/iniciardevolucion', [RecursosController::class, 'iniciarDevolucion']);
//
//Route::post('/subirarchivo', [RecursosController::class, 'subirArchivo']);
//Route::post('/eliminararchivo', [RecursosController::class, 'eliminarArchivo']);
//Route::post('/modificararchivo', [RecursosController::class, 'modificarArchivo']);
//Route::post('/descargararchivo', [RecursosController::class, 'descargarArchivo']);
//
////------------------------------------------------------------------------------
////                  ACCIONES CHAT.
////------------------------------------------------------------------------------
//
//Route::post('/enviarmensaje', [ConversacionesController::class, 'enviarMensaje']);
//Route::post('/eliminarmensaje', [ConversacionesController::class, 'eliminarMensaje']);
//Route::post('/modificarmensaje', [ConversacionesController::class, 'modificarMensaje']);
//Route::get('/buscarusuarios', [ConversacionesController::class, 'buscarUsuarios']);
//Route::get('/cargarmensajes', [ConversacionesController::class, 'cargarmensajes']);
//        
////------------------------------------------------------------------------------
////                  GESTIÓN PERSONAS.
////------------------------------------------------------------------------------
//

//Route::post('/modificarusuario', [PersonasController::class, 'modificarusuario']);
//
//
////------------------------------------------------------------------------------
////                  ACCIONES GENERALES.
////------------------------------------------------------------------------------
//
//Route::post('/modificarperfilusuario', [PersonasController::class, 'modificarUsuario']);
//Route::post('/subirarchivo', [PruebController::class, 'subirArchivo'])->name('subirarchivo');
//Route::get('/prueba4', [ForoController::class, 'probarArray']);
//Route::get('/vistaarchivo', [PruebaController::class, 'getVistaArchivo']);
//Route::post('/archivo', [PruebaController::class, 'subirArchivo']);
//Route::get('/vistachat', [ConversacionesController::class, 'getVistaChat'])->name('vistachat');
//Route::get('/vistarecursosglobales', [RecursosController::class, 'getVistaRecursosGlobales'])->name('vistarecursosglobales');
//Route::get('/vistarecursos', [RecursosController::class, 'getVistaRecursos'])->name('vistarecursos');