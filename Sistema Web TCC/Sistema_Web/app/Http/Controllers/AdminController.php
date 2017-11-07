<?php

namespace App\Http\Controllers;

use App\Voluntrab;
use App\User;
use App\Doacao;
use App\Denuncia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        $voluntrabs = Voluntrab::all();
        $users = User::all();
        $doacaos = Doacao::all();
        return view('admin.index', compact('voluntrabs','users','doacaos'));
    }

    public function user()
    {
        
        $users = User::all();
        
        return view('admin.user', compact('users'));
    }

    public function doacao()
    {
        
        $doacaos = Doacao::all();
        return view('admin.doacao', compact('doacaos'));
    }

    public function voluntrab()
    {
        $voluntrabs = Voluntrab::all();
        
        return view('admin.voluntrab', compact('voluntrabs'));
    }

    public function denuncia()
    {
        $denuncias = Denuncia::all();
        $users = User::all();

        return view('admin.denuncia', compact('denuncias', 'users'));
    }


}
