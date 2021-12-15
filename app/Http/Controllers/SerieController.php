<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{
    /**
     * @var Serie[]|\Illuminate\Database\Eloquent\Collection
     */
    /**
     * @var Serie[]|\Illuminate\Database\Eloquent\Collection
     */
    private $series;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _construct(){
        $this->series = Serie::all();
    }


    public function filtre(Request $request) {
        $genre = $request->get("genre", '');
        $series = [];
        if (empty($genre)) {
            return view('series.index', ['series' => "test"]);
        } else {
            foreach ($this->series as $serie) {
                if ($serie->genre == $genre) {
                    $series[] = $serie;
                }
            }
        }
        return view('series.index', ['series' => $series]);
    }
}
