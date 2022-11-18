<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuxiliarController;

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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Rutas para el Auxiliar de enfermería
Route::group(['middleware' => 'auxiliar'], function () {
    Route::resource('/paciente', '\App\Http\Controllers\PacienteController');
    Route::resource('/signosV', '\App\Http\Controllers\SignosVController');
    Route::resource('/restaurar', '\App\Http\Controllers\RestaurarController');
    Route::resource('/auxiliar', AuxiliarController::class);
    Route::get('download-pdf', 'App\Http\Controllers\PacienteController@generar_pdf')->name('descargar-pdf');
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

Route::get('antecedentes','\App\Http\Controllers\AntecedentesController@index' )->name('antecedentes');
Route::post('antecedentes/store','\App\Http\Controllers\AntecedentesController@store' )->name('antecedentes.store');