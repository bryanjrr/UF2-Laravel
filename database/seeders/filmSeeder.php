<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use faker\Factory as faker;
use Carbon\Carbon;


class filmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {

            DB::table('films')->insert([
                'name' => $faker->name(),
                'year' => $faker->year(),
                'genre' => $faker->randomElement(['Terror', 'Ciencia Ficcion', "Thriller", "Accion"]),
                'country' => $faker->country(),
                'duration' => $faker->numberBetween(100, 200),
                'img_url' => $faker->imageUrl(640, 480, 'people'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
