<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuxiliarController;
use App\Http\Controllers\JefeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\TipoExamenController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ExamenController;

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

// Rutas para manejo de sesiones
Auth::routes();

// Rutas para el Administrador
Route::group(['middleware' => 'admin'], function () {
    Route::resource('/usuario', '\App\Http\Controllers\UsuariosController');
    Route::resource('/tipoexamen', '\App\Http\Controllers\TipoExamenController');
    Route::resource('/doctor', '\App\Http\Controllers\DoctorController');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Rutas para el Auxiliar de enfermería
Route::group(['middleware' => 'auxiliar'], function () {
    Route::resource('/paciente', '\App\Http\Controllers\PacienteController');
    Route::resource('/turno', '\App\Http\Controllers\TurnoController');
    Route::resource('/signosV', '\App\Http\Controllers\SignosVController');
    Route::resource('/restaurar', '\App\Http\Controllers\RestaurarController');
    Route::resource('/auxiliar', AuxiliarController::class);
    Route::get('download-pdf', 'App\Http\Controllers\PacienteController@generar_pdf')->name('descargar-pdf');
});

// Rutas para el Jefe de enfermería
Route::group(['middleware' => 'jefe'], function () {
    Route::resource('/jefe', JefeController::class);
    Route::resource('/examen', '\App\Http\Controllers\ExamenController');  
});

// Rutas para el Médico cardiovascular
Route::group(['middleware' => 'medico'], function () {
    Route::resource('/medico', MedicoController::class);    
});

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('api', 'App\Http\Controllers\ApiController@index')->name('api');

Route::get('cuadro', 'App\Http\Controllers\FluidController@index')->name('fluids.index');

Route::post('cuadro/creado', 'App\Http\Controllers\FluidController@store')->name('fluids.store');

Route::get('cuadro/generar-pdf', 'App\Http\Controllers\FluidController@pdf')->name('pdf');

Route::resource('reporte1','\App\Http\Controllers\Reporte1Controller');
