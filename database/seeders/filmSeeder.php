<?php

namespace Database\Seeders;

use App\Models\Film;
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
    public function run()
    {
       return Film::factory()->count(10)->create();
    }
}
