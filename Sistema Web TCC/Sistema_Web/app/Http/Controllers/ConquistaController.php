<?php

namespace App\Http\Controllers;

use App\Conquista;
use App\User;
use Illuminate\Http\Request;

class ConquistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conquistas = Conquista::all();
        $users = User::all();

        return view('conquistas.index', compact('conquistas','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Conquista  $conquista
     * @return \Illuminate\Http\Response
     */
    public function show(Conquista $conquista)
    {
        return view('conquistas.view', compact('conquista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conquista  $conquista
     * @return \Illuminate\Http\Response
     */
    public function edit(Conquista $conquista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conquista  $conquista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conquista $conquista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conquista  $conquista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conquista $conquista)
    {
        //
    }
}
