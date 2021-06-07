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
Route::namespace('Site')->group(function () {
Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', 'ClientesController@index')->name('site.clientes');
Route::get('/clientes/adicionar', 'ClientesController@create')->name('site.clientes.adicionar');
Route::post('/clientes/{id}, ClientesController@destroy');

Route::get('/categorias', 'CategoryController@index')->name('site.categorias');
Route::get('/categorias/{category}', 'CategoryController@show')->name('site.categorias.avaliacoes');

Route::get('/atendimento', 'AssessmentsController@index');
Route::get('/atendimento/adicionar', 'AssessmentsController@create');
});




