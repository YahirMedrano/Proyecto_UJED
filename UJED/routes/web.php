<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\CardController;
use App\http\controllers\EstateController;
use App\http\controllers\EventController;
use App\http\controllers\ReservationController;
use App\http\controllers\SectionController;
use App\http\controllers\UserController;
use App\http\controllers\HomeController;
use App\http\controllers\QRCodeController;
use App\mail\AlertEvent;


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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\EventController::class, 'inicio']);
//rutas de login y regsitro
Auth::routes(); 

route::group(['middleware' => ['auth']], function(){

    Route::get('admin', [EventController::class, 'index']);

    //Estates
    Route::get('inmuebles', [EstateController::class, 'index']);
    Route::view('agregar-inmueble','crear-inmueble',);
    Route::post('crear-inmueble', [EstateController::class, 'save']);
    Route::post('actualizar-inmueble/{id}', [EstateController::class, 'update']);
    Route::get('eliminar-inmueble/{id}', [EstateController::class, 'delete']);
    Route::get('editar-inmueble/{id}', [EstateController::class, 'edit']);

    //Events
    Route::get('eventos', [EventController::class, 'index']);
    Route::get('detalle-eventos/{id}', [EventController::class, 'detalle']);
    Route::view('agregar-evento','crear-evento',);
    Route::post('crear-evento', [EventController::class, 'save']);
    Route::post('actualizar-evento/{id}', [EventController::class, 'update']);
    Route::get('eliminar-evento/{id}', [EventController::class, 'delete']);
    Route::get('editar-evento/{id}', [EventController::class, 'edit']);
    Route::get('confirmar-asistencia/{id}', [QRCodeController::class, 'confirmAttendance']);


    //Reservations
    Route::post('reservacion/{id}', [ReservationController::class, 'index']);
    Route::view('boleto','boleto',);
    Route::get('boletos-proximos', [ReservationController::class, 'boletoproximo']);
    Route::get('crear-boleto', [ReservationController::class, 'generarYenviarboleto']);
    Route::get('boletos-pasados', [ReservationController::class, 'boletopasado']);
    Route::get('confirmar-asistencia/{id}', [ReservationController::class, 'confirmar']);
    Route::get('crear-reservacion/{id1}/{id2}/{id3}', [ReservationController::class, 'save']);
    Route::get('reservacion-exitosa/{id}', [ReservationController::class, 'exitosa']);
    Route::post('actualizar-reservacion/{id}', [ReservationController::class, 'update']);
    Route::get('eliminar-reservacion/{id}', [ReservationController::class, 'delete']);
    Route::get('editar-reservacion/{id}', [ReservationController::class, 'edit']);

    //Sections
    Route::get('secciones', [SectionController::class, 'index']);
    Route::view('agregar-seccion', 'crear-seccion');
    Route::post('crear-seccion', [SectionController::class, 'save']);
    Route::post('actualizar-seccion/{id}', [SectionController::class, 'update']);
    Route::get('eliminar-seccion/{id}', [SectionController::class, 'delete']);
    Route::get('editar-seccion/{id}', [SectionController::class, 'edit']);

    //Users
    Route::get('usuario/{id}', [UserController::class, 'index']);
    Route::view('agregar-usuario','crear-usuario',);
    Route::post('crear-usuario', [UserController::class, 'save']);
    Route::post('actualizar-perfil/{id}', [UserController::class, 'update']);
    Route::get('eliminar-usuario/{id}', [UserController::class, 'delete']);
    Route::get('editar-perfil/{id}', [UserController::class, 'edit']);

    //Emails
    Route::get('send', function (){
        Mail::to("yir.futbol@gmail.com")->send(new AlertEvent());
        return view('home');
    });

    //Route::get('/generate-qr/{event}', 'QRCodeController@generateQRCode')->name('generate-qr');
});