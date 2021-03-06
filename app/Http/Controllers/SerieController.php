<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

    public function catalogue(){

        $series = [];
        $episode_nb = [];
        $saison_nb = [];
        $genres = [];

        foreach (Serie::all() as $serie) {
            $id = $serie->id;
            $episode_nb[] = DB::table('episodes')->where('serie_id', '=', $id)->count();
            $saison_nb[] = DB::table('episodes')->where('serie_id', '=', $id)->max('saison');
            $series[] = $serie;
            //$genre[] = DB::table('series')->select('genre')->where('id', '=', $id)->get();
        }
         foreach (Serie::distinct("genre")->get() as $genre) {
             $genres[$genre->genre]=$genre->genre;
         }
        //$genres = array_unique($genres, 'unique');
        return view("series.catalogue", ['series' => $series, "episode_nb" => $episode_nb, "saison_nb" => $saison_nb, 'genres' => $genres]);
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
    public function create(Request $request){
        $this->validate($request, [
            'content' => 'required',

        ]);
        $data = new Comment();
        $data->content = $request->message;
        $data->save();

        DB::table('comments')->insert([
            'content' => $data,
            'validated'=> False,

        ]);


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
                $episode = DB::table('episodes')->select('nom', 'saison', 'id', 'urlImage', 'numero')->where('serie_id', '=', $id)->get();
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
                $bool = false;
                foreach (Serie::all() as $serie) {
                    if (str_contains(strtoupper($serie->nom), strtoupper($nom))) {
                        $bool = true;
                        $series[] = $serie;
                        $episode_nb = DB::table('episodes')->where('serie_id', '=', $serie->id)->count();
                        $saison_nb = DB::table('episodes')->where('serie_id', '=', $serie->id)->max('saison');
                        $episode = DB::table('episodes')->select('nom', 'saison', 'id')->where('serie_id', '=', $serie->id)->get();
                    }
                }
                if($bool == true){
                    return view("series.filtre", ['series' => $series, "episode_nb" => $episode_nb, "saison_nb" => $saison_nb, "episode" => $episode]);
                }
            }
            return view('series.filtre', ['series' => $series]);
        }
        if($genre){
            $series = [];
            if (empty($genre)) {
                $series = $this->series;
            } else {
                $bool = false;
                foreach (Serie::all() as $serie) {
                    if (str_contains(strtoupper($serie->genre), strtoupper($genre))) {
                        $bool = true;
                        $series[] = $serie;
                        $episode_nb = DB::table('episodes')->where('serie_id', '=', $serie->id)->count();
                        $saison_nb = DB::table('episodes')->where('serie_id', '=', $serie->id)->max('saison');
                        $episode = DB::table('episodes')->select('nom', 'saison', 'id')->where('serie_id', '=', $serie->id)->get();
                    }
                }
                if($bool == true){
                    return view("series.filtre", ['series' => $series, "episode_nb" => $episode_nb, "saison_nb" => $saison_nb, "episode" => $episode]);
                }

            }
            return view('series.filtre', ['series' => $series]);
        }


    }

}
