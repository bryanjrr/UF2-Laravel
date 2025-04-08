<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use faker\Factory as faker;
use Carbon\Carbon;
use App\Models\Film;

class actorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       return Actor::factory()->count(10)->create();
    }
}
