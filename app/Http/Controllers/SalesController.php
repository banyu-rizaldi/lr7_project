<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Details;

class SalesController extends Controller
{

    public function index()
    {

        return view('sales.index');
    }
    
    public function sales(Request $request)
    {
   
       // mengambil data dari table pegawai
    	// $alert = DB::table('ALERT')->paginate(10);
        
        $getWitel = DB::table("ALERT")
                    ->select('*')
                    ->groupBy('WITEL')
                    ->get();

        
        if ($request->WITEL) {


            $summary = DB::table("ALERT")
                        ->select('*',DB::raw("COUNT('*') AS JUMLAH"))
                        ->where('WITEL','=',$request->WITEL)
                        ->groupBy('ATRIBUT','ALERT')
                        ->get();

        }elseif(!$request->WITEL){

            $summary = DB::table("ALERT")
                        ->select('*',DB::raw("COUNT('*') AS JUMLAH"))
                        ->groupBy('ATRIBUT','ALERT')
                        ->get();
        }elseif ($request->STO) {
            $summary = DB::table("ALERT")
                        ->select('*',DB::raw("COUNT('*') AS JUMLAH"))
                        ->where('STO','=',$request->STO)
                        ->groupBy('ATRIBUT','ALERT')
                        ->get();
        }
        

    	return view('master_data.alert.index',['summary'=>$summary,'getWitel'=>$getWitel]);
    }

    public function detil($NOTEL)
    {
        $summary = DB::table("ALERT")
                            ->select('*',
                                DB::raw("COUNT('*') AS JUMLAH"))
                            ->where('NOTEL','=',$NOTEL)

                            ->get();


    	return view('master_data.alert.details',['summary'=>$summary]);
    }

    public function edit(Request $request)
    {
        
        $summary = DB::table('ALERT')->where('NOTEL',$request->NOTEL)->update([
                        'WITEL' => $request->WITEL,
                        'STO' => $request->STO,
                    ]);

    	
    	return view('master_data.alert.details',['summary'=>$summary]);
    }
}
