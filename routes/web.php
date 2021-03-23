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

//2)imposto la rotta che richiama il metodo
//index (lo capiamo dal file homecontroller.php PUBLICO)
Route::get('/', 'HomeController@index')->name
('index');
    


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
Route::get('/', 'HomeController@index')
->name('home');
});