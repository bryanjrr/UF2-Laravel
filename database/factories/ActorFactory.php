<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;
use faker\Factory as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Actor::class;
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'name' => $faker->name(),
            'surname' => $faker->name(),
            'birthdate' => $faker->date(),
            'country' => $faker->country(),
            'img_url' => $faker->imageUrl(640, 480, 'people'),
        ];
    }
}
