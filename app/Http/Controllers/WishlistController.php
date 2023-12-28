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
        if ($wishListData->count() == 0) {
            return view('WishList', [
                'movies' => [],
                'message' => 'No wishlist added yet',
            ]);
        }
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
        $currentRoute = $request->route()->getName();

 
        if ($currentRoute === 'movies.index') {
            return redirect()->route('wishlistPage')->with('success', 'Movie added to wishlist successfully');
        } else {
            return redirect()->back()->with('success', 'Movie added to wishlist successfully');
        }
        
    }
    public function delete($id)
    {
        Wishlist::where('movie_id', $id)->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
