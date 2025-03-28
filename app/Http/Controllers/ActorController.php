<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class ActorController extends Controller
{
    public function listByDecade(Request $request)
    {
        $years = explode("-",  $request->input(key: "year"));
        $actors = DB::table("actors")->whereBetween('birthdate', [$years[0] . '-01-01', $years[1] . '-12-31'])->get();
        return view("actors.list", ["actors" => $actors, "title" => "Lista de Actores por Decada " . $years[0] . " " . $years[1]]);
    }

    public function listActors()
    {
        $title = "Lista de actores";
        $actors = DB::table('actors')->get();

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }
    public function countActors()
    {
        $title = "Cantidad de Actores Registrados";
        $contador = DB::table('actors')->count();
        $actors = DB::table('actors')->get();
        return view('actors.count', ["contador" => $contador, "title" => $title, "actors" => $actors]);
    }

    public function deleteActors($id)
    {
        $result = DB::table('actors')->where("id", $id)->delete();
        return response()->json(['accion' => 'delete', 'status' => $result == 1 ? "True" : "False"]);
    }
}
