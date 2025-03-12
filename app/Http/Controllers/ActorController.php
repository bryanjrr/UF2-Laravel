<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ActorController extends Controller
{

    public function listActors()
    {
        $actors = DB::table("actors")->get();
        return view("actors.list", ["actors" => $actors, "title" => "Lista de Actores"]);
    }

    public function countActors()
    {
        $actors = DB::table("actors")->get();
        $contador = DB::table("actors")->count();
        return view("actors.count", ["actors" => $actors, "contador" => $contador, "title" => "Contador de Actores"]);
    }
}
