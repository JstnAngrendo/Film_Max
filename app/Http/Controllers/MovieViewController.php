<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieViewController extends Controller
{
    public function index()
    {
        
        $movies = Movie::select('title', 'release_date')->get();

        return view('adminhome', ['movies' => $movies]);
    }


    public function destroy($movieid)
    {
        $movie = Movie::find($movieid);
        if ($movie) {
            $movie->delete();
        }

        return redirect()->route('adminhome');
    }
}
