<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Serie;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $lst=[];
        foreach ($user->seen as $el){
            if (!(in_array($el,$lst))){
                $lst[]=Serie::find($el->serie_id);
            }
        }

        return view('user.show',['user'=>$user,'seen'=>$lst]);
    }
}
