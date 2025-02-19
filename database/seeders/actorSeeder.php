<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class actorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /*          Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->year('birthdate');
            $table->string('country', 30);
            $table->string('img_url', 255);
            $table->timestamps();
             */
        DB::table('actors')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'birthdate'=> Date::random(),
            
        ]);
    }
}
