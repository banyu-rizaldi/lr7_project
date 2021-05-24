<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalitikController extends Controller
{
    //
    public function index()
    {
        $data_dossier = DB::table('ALERT2')
                        ->select('WITEL','KAWASAN')
                        ->groupByRaw('WITEL,KAWASAN')
                        ->whereNotNull('WITEL') 
                        ->get();

        // dd($data_dossier);

        return view('otentikasi.analitik', [
            'data_dossier' => $data_dossier
        ]);
    }

    public function alert()
    {
        return view('analitik.alert');
    }

    public function details()
    {
        return view('analitik.details');
    }

    // public function dropdown()
    // {
        
    // }
}
