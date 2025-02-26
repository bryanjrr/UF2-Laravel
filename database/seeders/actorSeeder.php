<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use faker\Factory as faker;
use Carbon\Carbon;

class actorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('actors')->insert([
                'name' => $faker->name(),
                'surname' => $faker->name(),
                'alias' => $faker->name(),
                'birthdate' => $faker->date(),
                'country' => $faker->country(),
                'img_url' => $faker->imageUrl(640, 480, 'people'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
