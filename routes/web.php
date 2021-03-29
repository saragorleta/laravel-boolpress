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

//2)imposto la rotta che richiama il metodo index 
//(lo capiamo dal file homecontroller.php PUBBLICO)
Route::get('/', 'HomeController@index')->name
('index');
//rotta per l'elenco di tutti i posts fatti con i seeders
//(lo capiamo dal file Postcontroller.php 
Route::get('/posts', 'PostController@index')->name
('guest.posts.index'); 
//rotta per i dettagli dei posts 
//(lo capiamo dal file Postcontroller.php 
Route::get('/posts/{slug}', 'PostController@show')->name
('guest.posts.show'); 
Route::get('/contatti','HomeController@contatti')->name
('guest.contatti');
Route::post('/contatti','HomeController@contattiSent')->name
('guest.contatti.sent');
Route::post('/inviato','HomeController@contattiInviato')->name
('guest.contatti.inviato');

Auth::routes();

//1)$this->middleware('auth'); è stata presa 
//dal file HomeController.php
// Route::get('/home', 'HomeController@index')->name('home')
// ->middleware('auth');

//3)creiamo rotte per gli admin. abbiamo commentato in un secondo momento il punto 1
//in quanto in questa route è già presente  ->middleware('auth')
Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {
        //pagina di benvenuto della dashboard
        Route::get('/', 'HomeController@index')->name('home');
        //pagina della parte amministrativa
        Route::resource('/post', 'PostController');
});