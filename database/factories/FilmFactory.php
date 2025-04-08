<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'name' => $faker->name(),
            'year' => $faker->year(),
            'genre' => $faker->randomElement(['Terror', 'Ciencia Ficcion', 'Thriller', 'Accion']),
            'country' => $faker->country(),
            'duration' => $faker->numberBetween(100, 200),
            'img_url' => $faker->imageUrl(640, 480, 'people'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Film $film) {
            $actors = Actor::inRandomOrder()->limit(3)->get();
            $film->actors()->attach($actors->pluck('id'));
        });
    }
}
