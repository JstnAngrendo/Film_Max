<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;

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
Route::post('/wishlist', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlistPage',[WishlistController::class, 'index']);



Route::get('/AdminHome', [MovieViewController::class, 'index'])->name('adminhome')->middleware(AuthMiddleware::class);
// Route::delete('/movies/{movieid}', [MovieViewController::class, 'destroy'])->name('movies.destroy');
