<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ConcertController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ArtistController::class)->group(function (){
   Route::get('/artists', 'index');
   Route::get('/artist', 'store');
   Route::get('/artist/{id}', 'show');
   Route::put('/artist/{id}', 'update');
   Route::delete('/artist/{id}', 'destroy');
});
Route::controller(ConcertController::class)->group(function (){
    Route::get('/concerts', 'index');
    Route::get('/concert', 'store');
    Route::get('/concert/{id}', 'show');
    Route::put('/concert/{id}', 'update');
    Route::delete('/concert/{id}', 'destroy');
});
