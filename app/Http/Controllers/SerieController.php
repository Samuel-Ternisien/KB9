<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    /**
     * @var Serie[]|\Illuminate\Database\Eloquent\Collection
     */
    /**
     * @var Serie[]|\Illuminate\Database\Eloquent\Collection
     */
    public $series;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _construct(){
        $this->series = Serie::all();
    }

    public function acceuil(){
        $series = Serie::all();
        return view('series.acceuil',['series'=> $series]);
    }

    public function index()
    {
        $res=DB::table('series')->orderByDesc('premiere')->get();
        $view = [];
        for($i=0; $i < 5;$i++){
            $view[] = $res[$i];
        }

        return view('welcome',['series'=> $view]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function serie($id) {
        $series = [];
        foreach (Serie::all() as $serie) {
            if ($serie->id == $id) {
                $series[] = $serie;
                $episode_nb = DB::table('episodes')->where('serie_id', '=', $id)->count();
                $saison_nb = DB::table('episodes')->where('serie_id', '=', $id)->max('saison');
                $episode[] = DB::table('episodes')->select('nom')->get();
                return view("series.details", ['series' => $series, "episode_nb" => $episode_nb, "saison" => $saison_nb, "episode" => $episode]);
            }
        }
        return view("series.details", ['series' => $series]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtre(Request $request) {
        $nom = $request->get("nom", '');
        $genre = $request->get("genre", '');
        if($nom){
            $series = [];
            if (empty($nom)) {
                $series = $this->series;
            } else {
                foreach (Serie::all() as $serie) {
                    if (str_contains($serie->nom, $nom)) {
                        $series[] = $serie;
                    }
                }
            }
            return view('series.filtre', ['series' => $series]);
        }
        if($genre){
            $series = [];
            if (empty($genre)) {
                $series = $this->series;
            } else {
                foreach (Serie::all() as $serie) {
                    if ($serie->genre == $genre) {
                        $series[] = $serie;
                    }
                }
            }
            return view('series.filtre', ['series' => $series]);
        }


    }

}
