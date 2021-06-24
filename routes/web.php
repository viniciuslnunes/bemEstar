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

// IMPLEMENTAR MIDDLEWARE DE LOG ACESSO

Route::namespace('Site')->group(function () {
Route::get('/', 'ClientsController@index')->name('site.clientes');

Route::resource('clientes', 'ClientsController');

Route::resource('formularios', 'FormsController');

Route::get('atendimento/index', 'AssessmentsCreateController@index')->name('atendimento.index');
Route::get('atendimento/create/{id}', 'AssessmentsCreateController@create')->where('id', '[0-9]+')->name('atendimento.create');
Route::post("atendimento/store", "AssessmentsCreateController@store")->name("atendimento.store");
Route::get("/atendimento/show/{id}", "AssessmentsCreateController@show")->where('id', '[0-9]+');
Route::get("/atendimento/edit/{id}", "AssessmentsCreateController@edit")->where('id', '[0-9]+')->name("atendimento.edit");
Route::post("/atendimento/update/{id}", "AssessmentsCreateController@update")->name("atendimento.update");
Route::get("/atendimento/destroy/{id}", "AssessmentsCreateController@destroy")->where('id', '[0-9]+')->name("atendimento.destroy");

Route::resource('avaliacoes', 'AssessmentsController');
Route::get('avaliacoes/criar-avaliacao/{id}', 'AssessmentsController@question')->name('avaliacoes.criar-avaliacao');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
