<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view('welcome');
});

Route::get('admin/kamar','PagesController@kamar')->middleware(['role', 'auth'])->name('kamar');

Route::get('/admin/santri', 'PagesController@santri')->middleware(['role', 'auth'])->name('santri.index');
// Route::get('/santri', 'PagesController@santri');
// Auth::routes();


Route::get('/santri', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
