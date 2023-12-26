<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_US');

        $numberOfReviewsPerMovie = 3;

        $movies = Movie::all();

        foreach ($movies as $movie) {
            for ($i = 0; $i < $numberOfReviewsPerMovie; $i++) {
                DB::table('reviews')->insert([
                    'author' => $faker->name(),
                    'movie_id' => $movie->movieId,
                    'reviewTitle' => $faker->sentence,
                    'reviewDesc' => $faker->paragraph,
                    'release_date' => $faker->dateTimeBetween('-2 years', 'now'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
