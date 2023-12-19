<?php

namespace Database\Factories;

use Faker\Generator as Faker;
=======


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


     protected $model = \App\Models\Movie::class;

     public function definition()
     {
         return [
             'title' => $this->faker->sentence,
             'movieId' => $this->faker->unique()->numberBetween(1, 1000),
             'release_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
         ];
     }

    public function definition(): array
    {
        return [
            //
        ];
    }

}
