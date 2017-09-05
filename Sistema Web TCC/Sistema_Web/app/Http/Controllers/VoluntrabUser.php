<?php

namespace App\Http\Controllers;


use App\Voluntrab;
use App\User;
use Illuminate\Http\Request;

class VoluntrabUser extends Controller
{
    public function adduser(Request $request,Voluntrab $voluntrab) {
        $user = User::find($request->users);
        
        $voluntrab->user()->save($user);
            return redirect()->route('voluntrabs.show', compact('voluntrab'));
    }

    public function deleteuser(Request $request,Voluntrab $voluntrab){
        
        $user = User::find($request->users);
         
         $voluntrab->user()->detach($user);
             return redirect()->route('voluntrabs.show', compact('voluntrab'));
     }

     public function view(User $user){

        $voluntrabs = Voluntrab::all();

        $users = User::all();

        return view('user.view', compact('user', 'voluntrabs', 'users'));
     }
}
