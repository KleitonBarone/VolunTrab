<?php

namespace App\Http\Controllers;

use App\Avalia;
use App\User;
use App\Doacao;
use App\Voluntrab;
use Illuminate\Http\Request;

class AvaliaUser extends Controller
{
    public function avaliauser(Request $request) {
        
        $voluntrab = Voluntrab::find($request->voluntrabid);
        
        $avaliados = $voluntrab->user;

        $avaliador = User::find($voluntrab->user_id);
        
        

        
        return view('user.avalia', compact('avaliador', 'avaliados', 'voluntrab'));
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

            $avalia = new Avalia();

            $avalia->nota = $nota;
            $avalia->comentario = $comentario;
            $avalia->id_avaliador = $avaliador->id;
            $avalia->user_id = $id_user;

            $avalia->save();

        }

        $voluntrab = Voluntrab::find($request->voluntrabid);

        $voluntrab->status = 1;
        
        $voluntrab->save();

        $voluntrabs = Voluntrab::all();
        $users = User::all();
        return redirect()->route('voluntrabs.index', compact('voluntrabs', 'users'));
    }

    public function avaliauserdoacao(Request $request) {
        
        $doacao = Doacao::find($request->doacaoid);
        
        $avaliados = $doacao->user;

        $avaliador = User::find($doacao->user_id);
        
        

        
        return view('user.avaliadoacao', compact('avaliador', 'avaliados', 'doacao'));
    }

    public function addavaliadoacao(Request $request) {
        
                $avaliador = User::find($request->avaliadorid);
                
                
                for ($i = 0; $i < $request->numero; $i++) {
                    $compid = "id" . $i;
                    $id_user = $request->$compid;
        
                    $compnota = "nota" . $i;
                    $nota = $request->$compnota;
        
                    $compcomentario = "comentario" . $i;
                    $comentario = $request->$compcomentario;
        
                    $avalia = new Avalia();
        
                    $avalia->nota = $nota;
                    $avalia->comentario = $comentario;
                    $avalia->id_avaliador = $avaliador->id;
                    $avalia->user_id = $id_user;
        
                    $avalia->save();
        
                }
        
                $doacao = Doacao::find($request->doacaoid);
        
                $doacao->status = 1;
                
                $doacao->save();
        
                $doacaos = Doacao::all();
                $users = User::all();
                return redirect()->route('doacaos.index', compact('doacaos', 'users'));
            }

}
