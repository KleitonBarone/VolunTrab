<?php

namespace App\Http\Controllers;

use App\Doacao;
use App\Voluntrab;
use App\User;
use Illuminate\Http\Request;

class DoacaoUser extends Controller
{
    public function adduser(Request $request,Doacao $doacao) {
        $user = User::find($request->users);
        
        $doacao->user()->save($user);
            return redirect()->route('doacaos.show', compact('doacao'));
    }

    public function deleteuser(Request $request,Doacao $doacao){
        
        $user = User::find($request->users);
         
         $doacao->user()->detach($user);
             return redirect()->route('doacaos.show', compact('doacao'));
     }

     public function view(User $user){

        $doacaos = Doacao::all();

        $users = User::all();

        return view('doacaos.view', compact('user', 'doacaos', 'users'));
     }
}
