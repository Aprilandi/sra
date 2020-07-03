<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function(){
    return view('welcome');
});

//Admin
Route::get('admin', 'PagesController@admin')->middleware(['admin', 'auth'])->name('admin.index');
Route::resource('admin/user', 'Admin\UserController')->middleware(['admin', 'auth']);
Route::resource('admin/jenis', 'Admin\JenisKecelakaanController')->middleware(['admin', 'auth']);
Route::resource('admin/status', 'Admin\StatusController')->middleware(['admin', 'auth']);
Route::resource('admin/rumahsakit', 'Admin\RumahSakitController')->middleware(['admin', 'auth']);
Route::resource('admin/kepolisian', 'Admin\KepolisianController')->middleware(['admin', 'auth']);
//End Admin


//Rumah Sakit
Route::get('rumahsakit', 'PagesController@rumahsakit')->middleware(['rs', 'auth'])->name('rs.index');

//End Rumah Sakit


//Kepolisian
Route::get('kepolisian', 'PagesController@kepolisian')->middleware(['pl', 'auth'])->name('pl.index');

//End Kepolisian


//Guest
Route::resource('lapor', 'LaporController')->middleware('lapor');

//End Guest

Route::get('profil/index', function(){
    return view('profil/profil');
})->middleware(['auth'])->name('profil/index');

Auth::routes();
