<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use Illuminate\Support\Facades\DB;
use faker\Factory as faker;
use Carbon\Carbon;


class Actor_filmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    /*     p
        Schema::create('actors_films', function (Blueprint $table) {
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('actor_id');
            $table->timestamps();
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('actor_id')->references('id')->on('actors');
        });
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {

            $filmId = DB::table('films')->pluck('id')->toArray();
            $actorId = DB::table('actors')->pluck('id')->toArray();


            DB::table('actors_films')->insert([
                'film_id' => array_rand($filmId) + 1,
                'actor_id' => array_rand($actorId) + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
