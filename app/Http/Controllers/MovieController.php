<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\MovieViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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
        
        // for ($movieId = 100; $movieId <= 200; $movieId++) {
        //     $reviews = Http::withToken(config('services.tmdb.token'))
        //         ->get("https://api.themoviedb.org/3/movie/{$movieId}/reviews")
        //         ->json();
        //     dump($reviews);
        // }
            
        
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

            $retrievedMovie['original_title'] = $movie->title;
            $retrievedMovie['release_date'] = $movie->release_date;
            $retrievedMovie['overview'] = $movie->synopsis;
            $retrievedMovies[] = $retrievedMovie;
        }
        return view('genre',[
            'movies' => $retrievedMovies
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
        $request->validate([
            'movieTitle' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'synopsis' => 'required|string',
        ]);

        $searchQuery = $request->input('movieTitle');
        
        $response = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie', [
                'query' => $searchQuery,
            ]);
        $movies = $response->json()['results'];
        
        $movieId = $movies[0]['id'];
        Movie::create([
            'title' => $request->input('movieTitle'),
            'release_date' => $request->input('releaseDate'),
            'synopsis' => $request->input('synopsis'),
            'movieId' => $movieId
        ]);

        return redirect()->route('adminhome')->with('success', 'Movie information has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get("https://api.themoviedb.org/3/movie/{$id}?append_to_response=credits,videos,images")
        ->json();

        $localMovie = Movie::where('movieId', $id)->first();
        if ($localMovie) {
            $movie['original_title'] = $localMovie->title;
            $movie['release_date'] = $localMovie->release_date;
            $movie['overview'] = $localMovie->synopsis;

            
        } else{
            $apiReviews = Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/movie/{$id}/reviews")
                ->json('results');
            // dd($apiReviews);
            if (!empty($apiReviews)) {
                foreach ($apiReviews as $apiReview) {
                    $review = new Review();
        
  
                    $review->movie_id = $id; 
                    $review->author = $apiReview['author'];
                    $contentWords = explode(' ', $apiReview['content']);
                    $review->reviewTitle = implode(' ', array_slice($contentWords, 0, 5));
        
                    $review->reviewDesc = $apiReview['content'];
                    
                    $releaseDate = Carbon::parse($apiReview['created_at'])->toDateTimeString();
                    $review->release_date = $releaseDate;
                    $review->save();
                }
            }
        }
        $reviews = Review::where('movie_id', $id)->get();
        $viewModel = new MovieViewModel($movie);
        return view('DetailPage', [
            'movie' => $viewModel->movie(),
            'reviews' => $reviews
        ]);
    }

    public function showUpdateForm($id)
    {
        $movie = Movie::where('movieId', $id)->first();

        if (!$movie) {
            abort(404); // Movie not found
        }

        return view('AdminUpdate', ['movie' => $movie]);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'movieTitle' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'synopsis' => 'required|string',
        ]);

        $movie = Movie::where('movieId', $id)->first();

        if (!$movie) {
            abort(404); // Movie not found
        }

        // Update the movie attributes
        $movie->update([
            'title' => $request->input('movieTitle'),
            'release_date' => $request->input('releaseDate'),
            'synopsis' => $request->input('synopsis'),
        ]);

        return redirect()->route('adminhome')->with('success', 'Movie information has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $movieId)
    {
        // dump($movieId);
        $movie = Movie::where('movieId', $movieId)->first();

        if (!$movie) {
            abort(404); // Movie not found
        }

        $movie->delete();

        return redirect()->back()->with('success', 'Movie deleted successfully');
    }
}
