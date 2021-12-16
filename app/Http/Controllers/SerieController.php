<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Serie;
use Illuminate\Support\Facades\Auth;
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

    public function serietoseen($id_serie){
        if(Auth::user()) {

            foreach (Episode::all() as $episode){
                $id_episode = DB::table('episodes')->select('id')->where('serie_id', '=', $id_serie)->get();
                $seen = DB::table('seen')->where('episode_id', '=', $id_episode);
            }
            return $seen;

        }
    }

    public function catalogue(){

        $series = [];
        $episode_nb = [];
        $saison_nb = [];
        $seen = [];
        foreach (Serie::all() as $serie) {
            $id = $serie->id;
            $episode_nb[] = DB::table('episodes')->where('serie_id', '=', $id)->count();
            $saison_nb[] = DB::table('episodes')->where('serie_id', '=', $id)->max('saison');
            $series[] = $serie;
            $seen[] = $this->serietoseen($id);
        }
        return view("series.catalogue", ['series' => $series, "episode_nb" => $episode_nb, "saison_nb" => $saison_nb, "seen" => $seen]);
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

    public function seen($id_episode, $id) {
        if(Auth::user() && Auth::user()->id == $id) {
            DB::table('seen')->insert([
                'user_id' => $id,
                'episode_id' => $id_episode,
                'date_seen' => now()
            ]);

            $id_serie = DB::table('episodes')->select('serie_id')->where('id', '=', $id_episode)->get();

            foreach ($id_serie as $v) {
                $res = $v->serie_id;
            }

            return redirect()->action(
                [SerieController::class, 'serie'], ['id' => $res]
            );
        } else {
            return redirect()->route('login');

        }

    }

    public function serie($id) {
        $series = [];
        foreach (Serie::all() as $serie) {
            if ($serie->id == $id) {
                $series[] = $serie;
                $episode_nb = DB::table('episodes')->where('serie_id', '=', $id)->count();
                $saison_nb = DB::table('episodes')->where('serie_id', '=', $id)->max('saison');
                $episode = DB::table('episodes')->select('nom', 'saison', 'id')->where('serie_id', '=', $id)->get();
                return view("series.details", ['series' => $series, "episode_nb" => $episode_nb, "saison_nb" => $saison_nb, "episode" => $episode]);
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
