<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $films = Storage::json('/public/films.json');
        $filmsBBDD = DB::table('films')->get()->toArray();

        $filmbdd = array_map(function ($film) {
            return (array) $film;
        }, $filmsBBDD);

        $listFilms = array_merge($films, $filmbdd);
        return $listFilms;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }

    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function filmsByYear($year = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis x Año";
        $films = FilmController::readFilms();

        if (is_null($year))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function sortFilms()
    {
        $title = "Listado de todas las pelis x Año Descendentemente";
        $films = FilmController::readFilms();

        $sorted_films = collect($films)->sortByDesc('year');

        return view("films.list", ["films" => $sorted_films, "title" => $title]);
    }



    public function filmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis x Categoria";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films, "title" => $title]);
    }


    public function countFilm()
    {
        $title = "Cantidad de Peliculas Registradas";
        $films = FilmController::readFilms();

        $contador = count($films);

        return view("films.count", [
            "contador" => $contador,
            "title" => $title,
            "films" => $films
        ]);
    }

    /* isFilm */
    public function isFilm($name)
    {
        $films = FilmController::readFilms();
        foreach ($films as $film) {
            if ($film['name'] == $name) {
                return true;
            }
        }
        return false;
    }


    public function createFilm(Request $request)
    {
        $filmName = $request->input('name');
        $year = $request->input('year');
        $genre = $request->input('genre');
        $contry = $request->input('country');
        $duration = $request->input('duration');
        $imageURL = $request->input('image_url');

        $title = "Crear Pelicula";

        $film = [
            'name' => $filmName,
            'year' => $year,
            'genre' => $genre,
            'country' => $contry,
            'duration' => $duration,
            'img_url' => $imageURL,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ];


        if (env('TipoInsert') == "json") {
            if (($this->isFilm($filmName))) {
                return redirect('/')->withErrors(['error' => 'El nombre de la película esta repetido!']);
            }
            $json = file_get_contents('../storage/app/public/films.json');
            $films = json_decode($json, true);
            array_push($films, $film);
            $jsonResultado = json_encode($films, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            file_put_contents('../storage/app/public/films.json', $jsonResultado);
        } else if (env('TipoInsert') == 'bbdd') {
            DB::table("films")->insert($film);
        }
        $film = FilmController::readFilms();
        return view('films.list', ['films' => $film, 'title' => $title]);
    }


    public function deleteFilm($id)
    {
        $result = DB::table('films')->where("id", $id)->delete();
        return response()->json(['accion' => 'delete', 'status' => $result == 1 ? "True" : "False"]);
    }
}
