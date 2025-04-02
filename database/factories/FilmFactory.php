<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;
use faker\Factory as faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Film::class;

    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'name' => $faker->name(),
            'year' => $faker->year(),
            'genre' => $faker->randomElement(['Terror', 'Ciencia Ficcion', "Thriller", "Accion"]),
            'country' => $faker->country(),
            'duration' => $faker->numberBetween(100, 200),
            'img_url' => $faker->imageUrl(640, 480, 'people'),
        ];
    }
}
