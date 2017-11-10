<?php

namespace App\Http\Controllers;

use App\Conquista;
use App\User;
use Illuminate\Http\Request;

class ConquistaUser extends Controller
{
    public function adduser(Request $request,Conquista $conquista) {
        $user = User::find($request->users);
        
        $conquista->user()->save($user);

            $conquistas = Conquista::all();
            $users = User::all();
            return redirect()->route('conquistas.index', compact('$conquistas', '$users'));
    }
}
