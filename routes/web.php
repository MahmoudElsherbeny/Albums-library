<?php

use Illuminate\Support\Facades\Auth;
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

//main pages routes
Route::get('/', 'HomeController@index')->middleware(['auth','verified'])->name('index');

//albums routes
Route::group(['middleware'=>['auth','verified'], 'prefix'=>'albums', 'as'=>'albums.'] , function() {

    Route::get('/create','AlbumController@create')->name('create');
    Route::post('/create','AlbumController@store')->name('store');
    Route::get('/{id}/edit','AlbumController@edit')->name('edit');
    Route::post('/{id}/edit','AlbumController@update')->name('update');
    Route::post('/{id}/delete','AlbumController@destroy')->name('delete');
    Route::post('/{id}/addTo','AlbumController@addTo')->name('addTo');
    Route::get('/{id}','HomeController@album_info')->name('info');

});

//images routes
Route::group(['middleware'=>['auth','verified'], 'prefix'=>'image', 'as'=>'images.'] , function() {

    Route::get('/{id}/album/{album}','ImageController@view')->name('view');
    Route::post('/{id}/album/{album}/move_to','ImageController@moveTo')->name('moveTo');
    Route::post('/{id}/album/{album}/delete','ImageController@destroy')->name('delete');

});

Auth::routes(['verify' => true]);