<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\MovieViewModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $upcomingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];


        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        

        return view('home',[
            'popularMovies' => $popularMovies,
            'upcomingMovies' => $upcomingMovies,
            'genres' => $genres
        ]);
        
    }

    

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');
        
        $response = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie', [
                'query' => $searchQuery,
            ]);
        $movies = $response->json()['results'];

        return view('movies.index', [
            'movies' => $movies,
            'pageTitle' => 'Search: '. $searchQuery
        ]);
    }
    public function showByGenre($genre)
    {
        $genreId = $this->getGenreIdByName($genre);
        if ($genreId === null) {
            abort(404);
        }
        // Make a request to TMDB API to get movies by genre
        $response = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/discover/movie", [
                'api_key' => config('services.tmdb.token'),
                'with_genres' => $genreId,
            ]);

        $movies = $response->json()['results'];

        return view('movies.index', [
            'movies' => $movies,
            'pageTitle' => 'Genre: ' .$genre
        ]);
    }
    private function getGenreIdByName($genreName)
    {
        $genreMapping = [
            'Action' => 28,
            'Adventure' => 12,
            'Animation' => 16,
            'Comedy' => 35,
            'Crime' => 80,
            'Documentary' => 99,
            'Drama' => 18,
            'Family' => 10751,
            'Fantasy' => 14,
            'History' => 36,
            'Horror' => 27,
            'Music' => 10402,
            'Mystery' => 9648,
            'Romance' => 10749,
            'Science Fiction' => 878,
            'TV Movie' => 10770,
            'Thriller' => 53,
            'War' => 10752,
            'Western' => 37,
            // Add more genres as needed
        ];

        return $genreMapping[$genreName] ?? null;
    }

    public function showMovie(){
        
        $movies = Movie::all();
        $retrievedMovies = [];
        foreach($movies as $movie){
            $movieId = $movie->movieId;
            $retrievedMovie = Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/movie/{$movieId}")
                ->json();
            $retrivedMovies[] = $retrievedMovie;
        }
        return view('genre',[
            'movies' => $retrivedMovies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
            ->json();
    
        $viewModel = new MovieViewModel($movie);
    
        return view('DetailPage', ['movie' => $viewModel->movie()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
