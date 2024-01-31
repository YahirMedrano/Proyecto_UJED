<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\CardController;
use App\http\controllers\EstateController;
use App\http\controllers\EventController;
use App\http\controllers\ReservationController;
use App\http\controllers\UserController;
use App\http\controllers\HomeController;
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

route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('admin', [EventController::class, 'index']);

    //Estates
    Route::get('inmuebles', [EstateController::class, 'index']);
    Route::view('agregar-inmueble','crear-inmueble',);
    Route::post('crear-inmueble', [EstateController::class, 'save']);
    Route::post('actualizar-inmueble/{id}', [EstateController::class, 'update']);
    Route::get('eliminar-inmueble/{id}', [EstateController::class, 'delete']);
    Route::get('editar-inmueble/{id}', [EstateController::class, 'edit']);

    Route::get('eventos', [EventController::class, 'index']);
    Route::view('agregar-evento','crear-evento',);
    Route::post('crear-evento', [EventController::class, 'save']);
    Route::post('actualizar-evento/{id}', [EventController::class, 'update']);
    Route::get('eliminar-evento/{id}', [EventController::class, 'delete']);
    Route::get('editar-evento/{id}', [EventController::class, 'edit']);

    Route::get('usuarios', [UserController::class, 'indexAll']);
    Route::view('agregar-admin','crear-admin',);
    Route::get('editar-usuario/{id}', [UserController::class, 'edit']);
    Route::post('actualizar-usuario/{id}', [UserController::class, 'update']);
    Route::post('crear-admin', [UserController::class, 'saveAdmin']);
    Route::post('actualizar-perfil/{id}', [UserController::class, 'updateP']);
    Route::get('eliminar-usuario/{id}', [UserController::class, 'delete']);
});

route::group(['middleware' => ['auth']], function(){

    //Events
   
    Route::get('detalle-eventos/{id}', [EventController::class, 'detalle']);

    //Reservations
    Route::get('reservacion/{id}', [ReservationController::class, 'index']);
    Route::view('boleto','boleto',);
    Route::get('pago/{id2}',[ReservationController::class, 'pagar']);
    Route::get('boletos-proximos', [ReservationController::class, 'boletoproximo']);
    Route::get('crear-boleto', [ReservationController::class, 'generarYenviarboleto']);
    Route::get('boletos-pasados', [ReservationController::class, 'boletopasado']);
    Route::get('confirmar-asistencia/{id}/{id2}', [ReservationController::class, 'confirmar']);
    Route::get('confirmacion/{id}', [ReservationController::class, 'confirmacion']);
    Route::get('crear-reservacion', [ReservationController::class, 'save']);
    Route::get('reservacion-exitosa/{id}', [ReservationController::class, 'exitosa']);
    Route::post('actualizar-reservacion/{id}', [ReservationController::class, 'update']);
    Route::get('eliminar-reservacion/{id}', [ReservationController::class, 'delete']);
    Route::get('editar-reservacion/{id}', [ReservationController::class, 'edit']);

    //Users
    Route::get('usuario/{id}', [UserController::class, 'index']);
    Route::get('editar-perfil/{id}', [UserController::class, 'editP']);

    //Emails
    /*Route::get('send', function (){
        Mail::to("yir.futbol@gmail.com")->send(new AlertEvent());
        return view('home');
    });*/
});