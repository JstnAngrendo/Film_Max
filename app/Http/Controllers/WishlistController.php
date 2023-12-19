<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class WishlistController extends Controller
{

    public function index(){
        
        $wishListData = Wishlist::all();
        $retrievedMovies = [];
        foreach($wishListData as $wishList){
            $movieId = $wishList->movie_id;
            $retrievedMovie = Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/movie/{$movieId}")
                ->json();
            $retrivedMovies[] = $retrievedMovie;
        }
        return view('WishList',[
            'movies' => $retrivedMovies
        ]);
    }
    public function addToWishlist(Request $request){
        $request->validate([
            'movie_id' => [
                function ($attribute, $value, $fail) {
                    $exists = Wishlist::where('user_id', auth()->id())
                        ->where('movie_id', $value)
                        ->exists();
    
                    if ($exists) {
                        $fail("This movie is already in the wishlist.");
                    }
                },
            ],
        ]);
        Wishlist::create([
            'user_id' => auth()->id(), 
            'movie_id' => $request->input('movie_id'),
        ]);
        
        return redirect()->back()->with('success', 'Movie added to wishlist successfully');
    }
}