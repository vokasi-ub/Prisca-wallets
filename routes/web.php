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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('auth.login');

Route::get('home', function () {
    return view('dashboard.dashboard');
});

Route::get('kategori', function () {
    return view('dashboard.kategori');
});

Route::get('order', function () {
    return view('dashboard.order');
});

Route::get('katalog', function () {
    return view('dashboard.katalog');
});

/* menampilkan halaman kategori */
Route::resource('kategori', 'HomeController');
/* crud kategori */
Route::get('editkategori/{idKategori}','HomeController@edit');
Route::post('updatekategori/{idKategori}','HomeController@update');
Route::post('tambahkategori','HomeController@store');
Route::get('tambahdata','HomeController@create');
Route::get('hapuskategori/{idKategori}','HomeController@destroy');

/* menampilkan halaman katalog */
Route::resource('katalog', 'katalogController');
/* crud katalog */
Route::get('editkatalog/{idKatalog}','KatalogController@edit');
Route::post('updatekatalog/{idKatalog}','KatalogController@update');
Route::post('tambahkatalog','KatalogController@store');
Route::get('tambahdatakatalog','KatalogController@create');
Route::get('hapuskatalog/{idKatalog}','KatalogController@destroy');

/* menampilkan halaman order */
Route::resource('order', 'OrderController');
/* crud order */
Route::get('editorder/{idOrder}','OrderController@edit');
Route::post('updateorder/{idOrder}','OrderController@update');
Route::post('tambahorder','OrderController@store');
Route::get('tambahdataorder','OrderController@create');
Route::get('hapusorder/{idOrder}','OrderController@destroy');

