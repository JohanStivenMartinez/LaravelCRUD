<?php

use Illuminate\Support\Facades\Route;
//Se hace el importe de UsuarioController
use App\Http\Controllers\UsuarioController;
//Import Tasks
use App\Http\Controllers\TasksController;


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

Route::get('/', function () {
    return view('auth.login');
});

//Forma manual de hacer la redirección a una vista
/*
Route::get('/Usuario', function () {
    return view('Usuario.index');
});

Route::get('/Usuario/create',[UsuarioController::class,'create']);

Fin Forma manual
*/

//Forma dinámica de representar las redirecciones de todas las clases
//El auth es para revisar que la verificacion sea exitosa para que continue con todas las paginas
Route::resource('Usuario', UsuarioController::class)-> middleware('auth');
//opciones que se quieren desaparecer
Auth::routes(['reset'=> false]);

Route::get('/home', [UsuarioController::class, 'index'])->name('home');

Route::prefix(['middleware' => 'auth'],function () {

    Route::get('/', [UsuarioController::class, 'index'])->name('home');
    //Route::get('/Tasks', [TasksController::class, 'index'])->name('home');

});


//Parte Tasks
/*
* Pruebas Routing
Route::get('/Tasks', function(){
    return view ('Tasks.index');
});

Route::get('/Tasks/createT', [TasksController::class, 'create']);*/
Route::resource('Tasks', TasksController::class);