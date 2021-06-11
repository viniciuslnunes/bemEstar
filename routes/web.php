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

Route::get('/clientes', 'ClientsController@index')->name('site.clientes');
Route::get('/clientes/create', 'ClientsController@create')->name('site.clientes.criar');
Route::get('/clientes/show', 'ClientsController@show')->name('site.clientes.show');
Route::post('/clientes/store', 'ClientsController@store')->name('site.clientes.store');
Route::get('/clientes/update', 'ClientsController@update')->name('site.clientes.edit');
Route::post('/clientes/{id}, ClientsController@destroy')->name('site.clientes.destroy');;

Route::get('/formularios', 'FormsController@index')->name('site.formularios');
Route::get('/formularios/criar', 'FormsController@create')->name('site.formularios.criar');
Route::post('/formularios/store', 'FormsController@store')->name('site.formularios.store');


Route::get('/avaliacoes', 'AssessmentsController@index')->name('site.avaliacoes');
Route::get('/avaliacoes/criar', 'AssessmentsController@create')->name('site.avaliacoes.criar');
Route::post('/avaliacoes/store', 'AssessmentsController@store')->name('site.avaliacoes.store');

});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
