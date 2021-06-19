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
Route::get('/', 'ClientsController@index')->name('site.clientes');

Route::resource('clientes', 'ClientsController');

Route::resource('formularios', 'FormsController');

Route::resource('avaliacoes', 'AssessmentsController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
