<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MovieViewController;
use App\Http\Controllers\WishlistController;

use App\Http\Middleware\AuthMiddleware;
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


// Route::get('/genre', function () {
//     return view('genre');
// });

Route::get('/genre',[MovieController::class,'showMovie']);
Route::get('/home',[MovieController::class,'index']);

Route::get('/review', [ViewController::class, 'showReviewPage'] );

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('DetailPage');

Route::post('/movies/search', [MovieController::class, 'search'])->name('movies.search');

Route::get('/movies/by-genre/{genreName}', [MovieController::class, 'showByGenre'])
    ->name('movies.byGenre');

Route::get('/actors/page/{page?}', [ActorController::class, 'index']);

Route::get('/actor/{id}', [ActorController::class, 'show'])->name('actors');

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/AdminHome', function(){
//     return view('AdminHome');
// })->middleware(AuthMiddleware::class)->name('adminhome');


Route::get('/AdminForm', function(){
    return view('AdminForm');
})->middleware(AuthMiddleware::class)->name('adminform');
Route::post('/process_movie', [MovieController::class, 'store'])->name('movies.store');


Route::post('/wishlist', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlistPage',[WishlistController::class, 'index']);



Route::get('/AdminHome', [MovieViewController::class, 'index'])->name('adminhome')->middleware(AuthMiddleware::class);
// Route::delete('/movies/{movieid}', [MovieViewController::class, 'destroy'])->name('movies.destroy');

Route::delete('/deleteMovie/{movieId}', [MovieController::class, 'destroy'])->name('deleteMovie');


// Update movie
Route::get('/adminUpdate/{movie}', [MovieController::class, 'showUpdateForm'])->name('movies.showUpdateForm');
Route::put('/adminUpdate/{movie}', [MovieController::class, 'update'])->name('movies.update');

Route::get("locale/{lang}",[LocalizationController::class,"setting"]);

Route::delete('/wishlist/delete/{id}', [WishlistController::class, 'delete'])->name('wishlist.delete');