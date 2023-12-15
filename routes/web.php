<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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


Route::get('/genre', function () {
    return view('genre');
});
Route::get('/',[MovieController::class,'index']);
Route::get('/review', [ViewController::class, 'showReviewPage'] );

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('DetailPage');

Route::post('/movies/search', [MovieController::class, 'search'])->name('movies.search');

Route::get('/movies/by-genre/{genreName}', [MovieController::class, 'showByGenre'])
    ->name('movies.byGenre');