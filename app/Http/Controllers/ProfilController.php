<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //
    public function index()
    {
        
    }

    public function profil()
    {
        return view('profil.profil');
    }

    public function leveraging()
    {
        return view('profil.leveraging');
    }

    public function retention()
    {
        return view('profil.retention');
    }

    public function kw()
    {
        return view('profil.kw');
    }
}
