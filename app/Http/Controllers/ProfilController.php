<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function churn()
    {
        return view('profil.churn');
    }

    public function kwg()
    {
        $data = DB::table("KUADRAN_GRANULAR")
                ->select(DB::raw('DISTINCT WITEL'))
                ->orderBy('WITEL','ASC')
                ->get();
        
        //dd($states);

        return view('profil.kwg',compact('data'));
    }

    public function kwgAjax($WITEL)
    {
        $datas = DB::table("KUADRAN_GRANULAR")
                ->select(DB::raw('DISTINCT STO'))
                ->where('WITEL','=',$WITEL)
                ->get();

        return json_encode($datas);
    }
}
