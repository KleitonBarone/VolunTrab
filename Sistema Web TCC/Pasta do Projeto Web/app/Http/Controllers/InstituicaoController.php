<?php

namespace App\Http\Controllers;

use App\Instituicao;
use Illuminate\Http\Request;
use Auth;

class InstituicaoController extends Controller
{

    public function login()
    {
        return view ('instituicaos.login');
    }

    public function postLogin(Request $request)
    {
        
        $dados = [ 'email' => $request->get('email') , 'password' => $request->get('password')];
        
        if ( auth()->guard('instituicao')->attempt($dados) ) 
        {
            return redirect('/home');

        } else {
            return redirect('/instituicaos/login')
            ->withErrors (['errors' => 'Login Inválido'])
            ->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('instituicao')->logout();

        return redirect('/home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show(Instituicao $instituicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituicao $instituicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituicao $instituicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituicao $instituicao)
    {
        //
    }
}
