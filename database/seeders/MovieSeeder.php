<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Facades\Http;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // \Database\Factories\MovieFactory::new()->count(10)->create();

        $moviesPerPage = 20;
        $pagesToFetch = 3;
        $movies = [];

        for ($page = 1; $page <= $pagesToFetch; $page++) {
            $apiData = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/discover/movie', [
                    'sort_by' => 'revenue.desc',
                    'page' => $page,
                ])
                ->json()['results'];

            $movies = array_merge($movies, $apiData);
        }

        foreach ($movies as $apiItem) {
            $releaseDate = !empty($apiItem['release_date']) ? $apiItem['release_date'] : null;
            Movie::create([
                'title' => $apiItem['title'],
                'movieId' => $apiItem['id'],
                'release_date' => $releaseDate,
                'synopsis' => $apiItem['overview']
            ]);
        }
    

    }
}
