<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'AuthController@login');
Route::post('/', 'AuthController@signIn');
Route::get('/logout', 'AuthController@logout');

Route::get('/recuperar', 'Auth\ResetPasswordController@resetPassword');
Route::post('/recuperar', 'Auth\ResetPasswordController@reset');
Route::get('/recuperar/{token}', 'Auth\ResetPasswordController@checkToken');
Route::post('/recuperar/{token}', 'Auth\ResetPasswordController@changePassword');

Route::prefix('app')->group(function () {   

    Route::get('/', 'UtilController@dashboard');
    Route::get('/sugest/pacientes', 'UtilController@sugestPacientes');

    Route::prefix('usuarios')->group(function () {  
        Route::get('', 'UserController@list');
        Route::get('ver/{id}', 'UserController@show');        
        Route::get('editar/{id}', 'UserController@edit');
        Route::post('editar/{id}', 'UserController@update');
        Route::get('crear', 'UserController@create');
        Route::post('crear', 'UserController@store');            
        Route::delete('{id}', 'UserController@delete');
    });

    Route::prefix('pacientes')->group(function () {  
        Route::get('', 'PacientesController@list');
        Route::get('ver/{id}', 'PacientesController@show');
        Route::get('ver/{id}/controles', 'PacientesController@controles');
        Route::get('editar/{id}', 'PacientesController@edit');
        Route::post('editar/{id}', 'PacientesController@update');
        Route::get('crear', 'PacientesController@create');
        Route::post('crear', 'PacientesController@store');            
        Route::delete('{id}', 'PacientesController@delete');
    });
     

    Route::resource('control', 'ControlController');
    Route::get('control/{id}/pdf', 'ControlController@pdf');

    Route::resource('analisis-photos', 'AnalisisPhotosController');
    Route::resource('analisis', 'AnalisisController');
    Route::get('analisis/{id}/api', 'AnalisisController@show_api');

    Route::resource('antecedentes', 'AntecedentesController');
    Route::get('antecedentes/{id}/pdf', 'AntecedentesController@getPDF');

    Route::resource('monitoreos', 'MonitoreoGlucosaController');
    Route::get('monitoreos/{id}/pdf', 'MonitoreoGlucosaController@getPDF');
});