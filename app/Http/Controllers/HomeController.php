<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];
        // dump($popularMovies);

        $upcomingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];
        // dump($upcomingMovies);

        return view('home',[
            'popularMovies' => $popularMovies,
            'upcomingMovies' => $upcomingMovies
        ]);
    }

    public function adminHome()
    {
        return view('admin-home');
    }
}
