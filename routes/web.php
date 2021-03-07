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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');


Route::get('/transaksi','TransaksiController@index')->name('transaksi');
Route::get('/list.transaksi','TransaksiController@list')->name('transaksi.list');
Route::post('/post.transaksi','TransaksiController@post')->name('transaksi.post');
Route::get('/transaksi/cari','TransaksiController@cari');
Route::get('/transaksi/cari_tgl','TransaksiController@cari_tgl');
Route::get('/transaksi/filter','TransaksiController@filter');
Route::get('{transaksi:id}/edit','TransaksiController@edit')->name('transaksi.edit');
Route::put('{transaksi:id}/update','TransaksiController@update')->name('transaksi.update');
Route::delete('{transaksi:id}/delete','TransaksiController@destroy')->name('transaksi.delete');

Route::get('/about', function () {
    return view('about');
})->name('about');
