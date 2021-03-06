<?php

namespace App\Http\Controllers;


use App\User;
use App\Avalia;

use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    public function show(User $user)
    {
        $allusers = User::all();
        

       $avalias = Avalia::all();
        

       

        return view('user.show', compact('user', 'allusers', 'avalias'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->datanasc = $request->datanasc;

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/avatars/' . $filename) );

            $user->avatar = $filename;
        }
        
        $user->save();
        
        return redirect('/home');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users');
    }
    
}
