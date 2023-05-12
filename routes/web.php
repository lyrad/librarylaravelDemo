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
    return view('welcome');
});

Route::get('/library', [
    \App\Http\Controllers\LibraryController::class,
    'index'
]);

Route::get('/address/search', [
    \App\Http\Controllers\LibraryController::class,
    'searchAddress'
]);
