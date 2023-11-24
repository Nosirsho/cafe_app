<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Place;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=>'Place'], function (){
    Route::get('/places', 'IndexController')->name('places.index');
    Route::get('/places/create', 'CreateController')->name('places.create');
    Route::get('/places/{place}', 'ShowController')->name('places.show');
    Route::post('/places', 'StoreController')->name('places.store');
    Route::get('/places/{place}/edit', 'EditController')->name('places.edit');
    Route::put('/places/{place}', 'UpdateController')->name('places.update');
    Route::delete('/places/{place}', 'DestroyController')->name('places.destroy');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
