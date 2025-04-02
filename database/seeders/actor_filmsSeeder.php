<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use Illuminate\Support\Facades\DB;
use faker\Factory as faker;
use Carbon\Carbon;
use App\Models\Actor;


class actor_filmsSeeder extends Seeder
{

    public function run(): void
    {
        $filmId = Film::all()->pluck('id')->toArray();
        $actorId = Actor::all()->pluck('id')->toArray();
        ;
        for ($i = 0; $i < 20; $i++) {
            DB::table('actors_films')->insert([
                'film_id' => $filmId[array_rand($filmId)],
                'actor_id' => $actorId[array_rand($actorId)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
