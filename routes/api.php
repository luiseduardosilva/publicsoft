<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('clientes')->group(function () {
    Route::get('/', 'ClienteController@index');
    Route::post('/', 'ClienteController@store');
    Route::get('/{id}', 'ClienteController@show');
    Route::delete('/{id}', 'ClienteController@destroy');
    Route::put('/{id}', 'ClienteController@update');
});

Route::prefix('etapas')->group(function () {
    Route::get('/', 'EtapaController@index');
    Route::post('/', 'EtapaController@store');
    Route::get('/{id}', 'EtapaController@show');
    Route::delete('/{id}', 'EtapaController@destroy');
    Route::put('/{id}', 'EtapaController@update');
});

Route::prefix('campos')->group(function () {
    Route::get('/', 'CampoController@index');
    Route::post('/', 'CampoController@store');
    Route::get('/{id}', 'CampoController@show');
    Route::delete('/{id}', 'CampoController@destroy');
    Route::put('/{id}', 'CampoController@update');
});

Route::prefix('vlcampos')->group(function () {
    Route::get('/', 'ValorCampoController@index');
    Route::post('/', 'ValorCampoController@store');
    Route::get('/{id}', 'ValorCampoController@show');
    Route::delete('/{id}', 'ValorCampoController@destroy');
    Route::put('/{id}', 'ValorCampoController@update');
});

Route::get('/tipos', "TipoController@index");