<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\HomeController;
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
// Route::get('/home',[MovieController::class,'index']);

Route::get('/detail', [ViewController::class, 'showDetailPage'] );
Route::get('/review', [ViewController::class, 'showReviewPage'] );


Route::get('/', function () {
    return view('auth/login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');