<?php

namespace App\Http\Controllers;

use App\User;
use App\Voluntrab;
use Illuminate\Http\Request;

class AvaliaUser extends Controller
{
    public function avaliauser(Request $request) {
        
        $avaliador = Voluntrab::find($request->voluntrabid);
        
        $avaliados = $avaliador->user;

        $avaliador = User::find($avaliador->user_id);
        
        

        
        return view('user.avalia', compact('avaliador', 'avaliados'));
    }

    public function addavalia(Request $request) {

        $avaliador = User::find($request->avaliadorid);
        
        
        for ($i = 0; $i < $request->numero; $i++) {
            $compid = "id" . $i;
            $id_user = $request->$compid;

            $compnota = "nota" . $i;
            $nota = $request->$compnota;

            $compcomentario = "comentario" . $i;
            $comentario = $request->$compcomentario;

            $avaliador->avalias()->attach($id_user , ['nota' => $nota, 'comentario' => $comentario]);

        }

        $voluntrabs = Voluntrab::all();
        $users = User::all();
        return redirect()->route('voluntrabs.index', compact('voluntrabs', 'users'));
    }
}
