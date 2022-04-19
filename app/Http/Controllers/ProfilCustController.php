<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilCustController extends Controller
{
    public function index(Request $request)
    {

        $bulan = DB::table("PROFIL_CUST_1")
                ->select(DB::raw('DISTINCT BULAN'))
                ->get();

        $bulanA = DB::table("PROFIL_CUST_1")
                ->select(DB::raw('DISTINCT BULAN'))
                ->get();
        
        $data = DB::table("PROFIL_CUST_1")
                ->select('*')
                ->groupBy('WITEL')
                ->get();

        $filter = DB::table("PROFIL_CUST_1")
                ->select('*')
                ->groupBy('PLEVEL1')
                ->get();
        
        //$ldate = date('Ym');
        
        $allData = DB::table("PROFIL_CUST_1")
                ->select(
                    'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                    DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE BULAN = '202111') as JUMLAH")
                )
                ->where('BULAN','=','202111')
                ->groupBy('PLEVEL1')
                ->get();

        // dd($allData);

        $grafik = DB::table("PROFIL_CUST_1")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_CUST_1) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_CUST_1) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_CUST_1) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_CUST_1) as DES"),
                    DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_CUST_1) as JAN22")
                )
                ->groupBy('PLEVEL1')
                ->get();

	 $grafik1 = DB::table("PROFIL_CUST_1")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
		            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
                    DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22")

                )

                ->groupBy('PLEVEL1')
                ->get();

        // dd($grafik);

        if ($request->WITEL) {

            $allData = DB::table("PROFIL_CUST_1")
                ->select(
                    'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                    DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND BULAN ='202112') as JUMLAH")
                )
                ->where('BULAN','=','202112')
                ->where('WITEL', '=', $request->WITEL)
                ->groupBy('PLEVEL1')
                ->get();

            $grafik = DB::table("PROFIL_CUST_1")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL') as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL') as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL') as DES"),
                    DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL') as JAN22")
                    )
                ->where('WITEL', '=', $request->WITEL)
                ->groupBy('PLEVEL1')
                ->get();
                
		$grafik1 = DB::table("PROFIL_CUST_1")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
                    DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22")


                )
		->where('WITEL', '=', $request->WITEL)
                ->groupBy('PLEVEL1')
                ->get();

		
            // dd($grafik);

        }

        if ($request->BULAN) {

            $allData = DB::table("PROFIL_CUST_1")
                ->select(
                    'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                    DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE BULAN = '$request->BULAN') as JUMLAH")
                )
                ->where('BULAN', '=', $request->BULAN)
                ->groupBy('PLEVEL1')
                ->get();

            // dd($allData);

            $bulanA = DB::table("PROFIL_CUST_1")
                ->select(DB::raw('DISTINCT BULAN'))
                ->where('BULAN','=',$request->BULAN)
                ->get();
	


        }

        if ($request->FILTER) {

            $allData = DB::table("PROFIL_CUST_1")
                        ->select(
                            'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

            $grafik = DB::table("PROFIL_CUST_1")
                        ->select(
                            '*', 
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as JAN22")
                            )
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

		$grafik1 = DB::table("PROFIL_CUST_1")
                ->select(
                    '*',                   
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
                    DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22")


                )
		->where('PLEVEL1', '=', $request->FILTER)
                ->groupBy('PLEVEL2')
                ->get();



        }

        if ($request->WITEL && $request->BULAN) {

            $allData = DB::table("PROFIL_CUST_1")
                        ->select(
                            'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND BULAN = '$request->BULAN') as JUMLAH")
                        )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('BULAN', '=', $request->BULAN)
                        ->groupBy('PLEVEL1')
                        ->get();

        }

        if ($request->WITEL && $request->FILTER) {

            $allData = DB::table("PROFIL_CUST_1")
                        ->select(
                            'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();
            
            $grafik = DB::table("PROFIL_CUST_1")
                        ->select(
                            '*',
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JAN22")
                            )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

		$grafik1 = DB::table("PROFIL_CUST_1")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
                    DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22")

                )
		->where('WITEL', '=', $request->WITEL)
                ->where('PLEVEL1', '=', $request->FILTER)
                ->groupBy('PLEVEL2')
                ->get();

		

        }

        if ($request->BULAN && $request->FILTER) {

            $allData = DB::table("PROFIL_CUST_1")
                        ->select(
                            'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE BULAN = '$request->BULAN' AND PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        ->where('BULAN', '=', $request->BULAN)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

            $grafik = DB::table("PROFIL_CUST_1")
                        ->select(
                            '*',
                            
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE PLEVEL1 = '$request->FILTER') as JAN22")
                            )
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();
	
            $grafik1 = DB::table("PROFIL_CUST_1")
                        ->select(
                            '*',
                            
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22")

                        )
                                ->where('PLEVEL1', '=', $request->FILTER)
                                ->groupBy('PLEVEL2')
                                ->get();

        }

        if ($request->WITEL && $request->BULAN && $request->FILTER) {

            // dd($request->all());

            $allData = DB::table("PROFIL_CUST_1")
                        ->select(
                            'BULAN','WITEL','STO','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND BULAN = '$request->BULAN' AND PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('BULAN', '=', $request->BULAN)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

            $grafik = DB::table("PROFIL_CUST_1")
                        ->select(
                            '*',
                            
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_CUST_1 WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JAN22")
                            )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();
	
	$grafik1 = DB::table("PROFIL_CUST_1")
                ->select(
                    '*',
                     
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22")

                )
		->where('WITEL', '=', $request->WITEL)
                ->where('PLEVEL1', '=', $request->FILTER)
                ->groupBy('PLEVEL2')
                ->get();


        }
        

        return view('profilcust', compact('bulan','filter','allData','data','grafik','bulanA','grafik1'));
    }
}
