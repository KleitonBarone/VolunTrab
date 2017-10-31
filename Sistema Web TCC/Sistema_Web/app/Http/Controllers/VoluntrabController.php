<?php

namespace App\Http\Controllers;

use App\Voluntrab;
use App\User;
use Illuminate\Http\Request;
use Image;

class VoluntrabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntrabs = Voluntrab::all();
        $users = User::all();
        return view('voluntrabs.index', compact('voluntrabs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voluntrabs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voluntrab = new Voluntrab();
        
                $voluntrab->titulo = $request->titulo;
                $voluntrab->local = $request->local;
                $voluntrab->data = $request->data;
                $voluntrab->desc = $request->desc;
                $voluntrab->status = 0;
                $voluntrab->user_id = $request->user_id;

                if($request->hasFile('avatar')){
                    $avatar = $request->file('avatar');
                    $filename = time() . '.' . $avatar->getClientOriginalExtension();
                    Image::make($avatar)->resize(300, 300)->save( public_path('/avatarsvoluntrab/' . $filename) );
        
                    $voluntrab->avatar = $filename;
                }

                $voluntrab->save();
                
                return redirect('/voluntrabs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voluntrab  $voluntrab
     * @return \Illuminate\Http\Response
     */
    public function show(Voluntrab $voluntrab)
    {
        $users = User::all();
        return view('voluntrabs.show', compact('voluntrab', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voluntrab  $voluntrab
     * @return \Illuminate\Http\Response
     */
    public function edit(Voluntrab $voluntrab)
    {
        return view('voluntrabs.edit', compact('voluntrab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voluntrab  $voluntrab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voluntrab $voluntrab)
    {
        $voluntrab->titulo = $request->titulo;
        $voluntrab->data = $request->data;
        $voluntrab->local = $request->local;
        $voluntrab->desc = $request->desc;

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/avatarsvoluntrab/' . $filename) );

            $voluntrab->avatar = $filename;
        }

        $voluntrab->save();
        
                return redirect('/voluntrabs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voluntrab  $voluntrab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voluntrab $voluntrab)
    {
        $voluntrab->delete();
        return redirect('/voluntrabs');
    }

    public function complete(Voluntrab $voluntrab)
    {
        $voluntrab->status = 1;

        $voluntrab->save();

        return redirect('/voluntrabs');


    }
}
