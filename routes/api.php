<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
;

Route::get('/library/{id}', [
    \App\Http\Controllers\LibraryApiController::class,
    'show'
])
    ->name('api.library.show')
    ->where('id', '[0-9]+')
;

Route::post('/library', [
    \App\Http\Controllers\LibraryApiController::class,
    'create'
])
    ->name('api.library.create')
;
