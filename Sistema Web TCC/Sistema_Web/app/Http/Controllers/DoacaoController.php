<?php

namespace App\Http\Controllers;

use App\Doacao;
use App\Voluntrab;
use App\User;
use Illuminate\Http\Request;
use Image;

class DoacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doacaos = Doacao::all();
        $users = User::all();
        return view ('doacaos.index', compact('doacaos', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doacaos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doacao = new Doacao();
        
                $doacao->item = $request->item;
                $doacao->data = $request->data;
                $doacao->desc = $request->desc;
                $doacao->local = $request->local;
                $doacao->status = 0;
                $doacao->user_id = $request->user_id;

                if($request->hasFile('avatar')){
                    $avatar = $request->file('avatar');
                    $filename = time() . '.' . $avatar->getClientOriginalExtension();
                    Image::make($avatar)->resize(300, 300)->save( public_path('/avatarsdoacao/' . $filename) );
        
                    $doacao->avatar = $filename;
                }

                $doacao->save();
                
                return redirect('/doacaos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doacao  $doacao
     * @return \Illuminate\Http\Response
     */
    public function show(Doacao $doacao)
    {
        $users = User::all();
        return view('doacaos.show', compact('doacao', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doacao  $doacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Doacao $doacao)
    {
        return view('doacaos.edit', compact('doacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doacao  $doacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doacao $doacao)
    {
        $doacao->item = $request->item;
        $doacao->data = $request->data;
        $doacao->local = $request->local;
        $doacao->desc = $request->desc;

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/avatarsdoacao/' . $filename) );

            $doacao->avatar = $filename;
        }

        $doacao->save();
        
            return redirect('/doacaos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doacao  $doacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doacao $doacao)
    {
        $doacao->delete();
        return redirect('/doacaos');
    }

    public function complete(Doacao $doacao)
    {
        $doacao->status = 1;

        $doacao->save();

        return redirect('/doacaos');


    }
}
