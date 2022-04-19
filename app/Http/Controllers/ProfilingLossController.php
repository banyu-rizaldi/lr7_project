<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilingLossController extends Controller
{
    
   public function index(Request $request)
    {

        $bulan = DB::table("PROFIL_LOSS")
                ->select(DB::raw('DISTINCT BULAN'))
                ->get();

        $bulanA = DB::table("PROFIL_LOSS")
                ->select(DB::raw('DISTINCT BULAN'))
                ->get();
        
        $data = DB::table("PROFIL_LOSS")
                ->select('*')
                ->groupBy('WITEL')
                ->get();

        $filter = DB::table("PROFIL_LOSS")
                ->select('*')
                ->groupBy('PLEVEL1')
                ->get();
        
        // $ldate = date('Ym');
        
        $allData = DB::table("PROFIL_LOSS")
                ->select(
                    'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                    DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE BULAN = '202110') as JUMLAH")
                )
                ->where('BULAN','=','202110')
                ->groupBy('PLEVEL1')
                ->get();

        // dd($allData);

        $grafik = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202101',JUMLAH,0))/(SELECT SUM(IF(BULAN='202101',JUMLAH,0)) FROM PROFIL_LOSS) as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0))/(SELECT SUM(IF(BULAN='202102',JUMLAH,0)) FROM PROFIL_LOSS) as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0))/(SELECT SUM(IF(BULAN='202103',JUMLAH,0)) FROM PROFIL_LOSS) as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0))/(SELECT SUM(IF(BULAN='202104',JUMLAH,0)) FROM PROFIL_LOSS) as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0))/(SELECT SUM(IF(BULAN='202105',JUMLAH,0)) FROM PROFIL_LOSS) as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0))/(SELECT SUM(IF(BULAN='202106',JUMLAH,0)) FROM PROFIL_LOSS) as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0))/(SELECT SUM(IF(BULAN='202107',JUMLAH,0)) FROM PROFIL_LOSS) as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0))/(SELECT SUM(IF(BULAN='202108',JUMLAH,0)) FROM PROFIL_LOSS) as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_LOSS) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_LOSS) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_LOSS) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_LOSS) as DES"),
		            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_LOSS) as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0))/(SELECT SUM(IF(BULAN='202202',JUMLAH,0)) FROM PROFIL_LOSS) as FEB22")
                    )
                ->groupBy('PLEVEL1')
                
                ->get();

        // dd($grafik);
	
	 $grafik1 = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                     DB::raw("SUM(IF(BULAN='202101',JUMLAH,0)) as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0)) as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0)) as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0)) as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0)) as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0)) as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0)) as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0)) as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
		            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0)) as FEB22")
                )
                
                ->groupBy('PLEVEL1')
                ->get();
	
	//dd($grafik1);

        if ($request->WITEL) {

            $allData = DB::table("PROFIL_LOSS")
                ->select(
                    'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                    DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND BULAN ='202202') as JUMLAH")
                )
                ->where('BULAN','=','202202')
                ->where('WITEL', '=', $request->WITEL)
                ->groupBy('PLEVEL1')
                ->get();

            $grafik = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202101',JUMLAH,0))/(SELECT SUM(IF(BULAN='202101',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0))/(SELECT SUM(IF(BULAN='202102',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0))/(SELECT SUM(IF(BULAN='202103',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0))/(SELECT SUM(IF(BULAN='202104',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0))/(SELECT SUM(IF(BULAN='202105',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0))/(SELECT SUM(IF(BULAN='202106',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0))/(SELECT SUM(IF(BULAN='202107',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0))/(SELECT SUM(IF(BULAN='202108',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as DES"),
                    DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0))/(SELECT SUM(IF(BULAN='202202',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL') as FEB22")
                )
                ->where('WITEL', '=', $request->WITEL)
                ->groupBy('PLEVEL1')
                ->get();
                

	$grafik1 = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202101',JUMLAH,0)) as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0)) as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0)) as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0)) as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0)) as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0)) as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0)) as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0)) as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
		            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0)) as FEB22")
                )
		->where('WITEL', '=', $request->WITEL)
                ->groupBy('PLEVEL1')

                ->get();
            // dd($grafik);

        }

        if ($request->BULAN) {

            $allData = DB::table("PROFIL_LOSS")
                ->select(
                    'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                    DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE BULAN = '$request->BULAN') as JUMLAH")
                )
                ->where('BULAN', '=', $request->BULAN)
                ->groupBy('PLEVEL1')
                ->get();

            $bulanA = DB::table("PROFIL_LOSS")
                ->select(DB::raw('DISTINCT BULAN'))
                ->where('BULAN','=',$request->BULAN)
                ->get();



        }

        if ($request->FILTER) {

            $allData = DB::table("PROFIL_LOSS")
                        ->select(
                            'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

            $grafik = DB::table("PROFIL_LOSS")
                        ->select(
                            '*',
                            DB::raw("SUM(IF(BULAN='202101',JUMLAH,0))/(SELECT SUM(IF(BULAN='202101',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JAN21"),
                            DB::raw("SUM(IF(BULAN='202102',JUMLAH,0))/(SELECT SUM(IF(BULAN='202102',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as FEB21"),
                            DB::raw("SUM(IF(BULAN='202103',JUMLAH,0))/(SELECT SUM(IF(BULAN='202103',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as MAR"),
                            DB::raw("SUM(IF(BULAN='202104',JUMLAH,0))/(SELECT SUM(IF(BULAN='202104',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as APR"),
                            DB::raw("SUM(IF(BULAN='202105',JUMLAH,0))/(SELECT SUM(IF(BULAN='202105',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as MEI"),
                            DB::raw("SUM(IF(BULAN='202106',JUMLAH,0))/(SELECT SUM(IF(BULAN='202106',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JUN"),
                            DB::raw("SUM(IF(BULAN='202107',JUMLAH,0))/(SELECT SUM(IF(BULAN='202107',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JUL"),
                            DB::raw("SUM(IF(BULAN='202108',JUMLAH,0))/(SELECT SUM(IF(BULAN='202108',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as AUG"),
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as DES"),                         
			                DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JAN22"),
                            DB::raw("SUM(IF(BULAN='202202',JUMLAH,0))/(SELECT SUM(IF(BULAN='202202',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as FEB22")
			)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

		 $grafik1 = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202101',JUMLAH,0)) as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0)) as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0)) as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0)) as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0)) as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0)) as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0)) as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0)) as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
		            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0)) as FEB22")
                )
		 ->where('PLEVEL1', '=', $request->FILTER)
                 ->groupBy('PLEVEL2')
                ->get();


        }

        if ($request->WITEL && $request->BULAN) {

            $allData = DB::table("PROFIL_LOSS")
                        ->select(
                            'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND BULAN = '$request->BULAN') as JUMLAH")
                        )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('BULAN', '=', $request->BULAN)
                        ->groupBy('PLEVEL1')
                        ->get();

        }

        if ($request->WITEL && $request->FILTER) {

            $allData = DB::table("PROFIL_LOSS")
                        ->select(
                            'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();
            
            $grafik = DB::table("PROFIL_LOSS")
                        ->select(
                            '*',
                            DB::raw("SUM(IF(BULAN='202101',JUMLAH,0))/(SELECT SUM(IF(BULAN='202101',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JAN21"),
                            DB::raw("SUM(IF(BULAN='202102',JUMLAH,0))/(SELECT SUM(IF(BULAN='202102',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as FEB21"),
                            DB::raw("SUM(IF(BULAN='202103',JUMLAH,0))/(SELECT SUM(IF(BULAN='202103',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as MAR"),
                            DB::raw("SUM(IF(BULAN='202104',JUMLAH,0))/(SELECT SUM(IF(BULAN='202104',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as APR"),
                            DB::raw("SUM(IF(BULAN='202105',JUMLAH,0))/(SELECT SUM(IF(BULAN='202105',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as MEI"),
                            DB::raw("SUM(IF(BULAN='202106',JUMLAH,0))/(SELECT SUM(IF(BULAN='202106',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JUN"),
                            DB::raw("SUM(IF(BULAN='202107',JUMLAH,0))/(SELECT SUM(IF(BULAN='202107',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JUL"),
                            DB::raw("SUM(IF(BULAN='202108',JUMLAH,0))/(SELECT SUM(IF(BULAN='202108',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as AUG"),
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JAN22"),
                            DB::raw("SUM(IF(BULAN='202202',JUMLAH,0))/(SELECT SUM(IF(BULAN='202202',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as FEB22")
                        )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

 $grafik1 = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202101',JUMLAH,0)) as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0)) as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0)) as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0)) as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0)) as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0)) as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0)) as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0)) as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
		            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0)) as FEB22")
                )
		->where('WITEL', '=', $request->WITEL)
                ->where('PLEVEL1', '=', $request->FILTER)
                ->groupBy('PLEVEL2')

                ->get();

        }

        if ($request->BULAN && $request->FILTER) {

            $allData = DB::table("PROFIL_LOSS")
                        ->select(
                            'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE BULAN = '$request->BULAN' AND PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        ->where('BULAN', '=', $request->BULAN)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();
            
            $grafik = DB::table("PROFIL_LOSS")
                        ->select(
                            '*',
                            DB::raw("SUM(IF(BULAN='202101',JUMLAH,0))/(SELECT SUM(IF(BULAN='202101',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JAN21"),
                            DB::raw("SUM(IF(BULAN='202102',JUMLAH,0))/(SELECT SUM(IF(BULAN='202102',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as FEB21"),
                            DB::raw("SUM(IF(BULAN='202103',JUMLAH,0))/(SELECT SUM(IF(BULAN='202103',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as MAR"),
                            DB::raw("SUM(IF(BULAN='202104',JUMLAH,0))/(SELECT SUM(IF(BULAN='202104',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as APR"),
                            DB::raw("SUM(IF(BULAN='202105',JUMLAH,0))/(SELECT SUM(IF(BULAN='202105',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as MEI"),
                            DB::raw("SUM(IF(BULAN='202106',JUMLAH,0))/(SELECT SUM(IF(BULAN='202106',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JUN"),
                            DB::raw("SUM(IF(BULAN='202107',JUMLAH,0))/(SELECT SUM(IF(BULAN='202107',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JUL"),
                            DB::raw("SUM(IF(BULAN='202108',JUMLAH,0))/(SELECT SUM(IF(BULAN='202108',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as AUG"),
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as JAN22"),
                            DB::raw("SUM(IF(BULAN='202202',JUMLAH,0))/(SELECT SUM(IF(BULAN='202202',JUMLAH,0)) FROM PROFIL_LOSS WHERE PLEVEL1 = '$request->FILTER') as FEB22")
                        )

                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

 $grafik1 = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202101',JUMLAH,0)) as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0)) as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0)) as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0)) as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0)) as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0)) as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0)) as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0)) as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
		            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0)) as FEB22")
                )
                ->where('PLEVEL1', '=', $request->FILTER)
                ->groupBy('PLEVEL2')

                ->get();

        }

        if ($request->WITEL && $request->BULAN && $request->FILTER) {

            // dd($request->all());

            $allData = DB::table("PROFIL_LOSS")
                        ->select(
                            'BULAN','WITEL','STO','STATUS_LOSS','PLEVEL1','PLEVEL2',
                            DB::raw("SUM(JUMLAH)/(SELECT SUM(JUMLAH) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND BULAN = '$request->BULAN' AND PLEVEL1 = '$request->FILTER') as JUMLAH")
                        )
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('BULAN', '=', $request->BULAN)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();

            $grafik = DB::table("PROFIL_LOSS")
                        ->select(
                            '*',
                            DB::raw("SUM(IF(BULAN='202101',JUMLAH,0))/(SELECT SUM(IF(BULAN='202101',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JAN21"),
                            DB::raw("SUM(IF(BULAN='202102',JUMLAH,0))/(SELECT SUM(IF(BULAN='202102',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as FEB21"),
                            DB::raw("SUM(IF(BULAN='202103',JUMLAH,0))/(SELECT SUM(IF(BULAN='202103',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as MAR"),
                            DB::raw("SUM(IF(BULAN='202104',JUMLAH,0))/(SELECT SUM(IF(BULAN='202104',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as APR"),
                            DB::raw("SUM(IF(BULAN='202105',JUMLAH,0))/(SELECT SUM(IF(BULAN='202105',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as MEI"),
                            DB::raw("SUM(IF(BULAN='202106',JUMLAH,0))/(SELECT SUM(IF(BULAN='202106',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JUN"),
                            DB::raw("SUM(IF(BULAN='202107',JUMLAH,0))/(SELECT SUM(IF(BULAN='202107',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JUL"),
                            DB::raw("SUM(IF(BULAN='202108',JUMLAH,0))/(SELECT SUM(IF(BULAN='202108',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as AUG"),
                            DB::raw("SUM(IF(BULAN='202109',JUMLAH,0))/(SELECT SUM(IF(BULAN='202109',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as SEP"),
                            DB::raw("SUM(IF(BULAN='202110',JUMLAH,0))/(SELECT SUM(IF(BULAN='202110',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as OCT"),
                            DB::raw("SUM(IF(BULAN='202111',JUMLAH,0))/(SELECT SUM(IF(BULAN='202111',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as NOV"),
                            DB::raw("SUM(IF(BULAN='202112',JUMLAH,0))/(SELECT SUM(IF(BULAN='202112',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as DES"),
                            DB::raw("SUM(IF(BULAN='202201',JUMLAH,0))/(SELECT SUM(IF(BULAN='202201',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as JAN22"),
                            DB::raw("SUM(IF(BULAN='202202',JUMLAH,0))/(SELECT SUM(IF(BULAN='202202',JUMLAH,0)) FROM PROFIL_LOSS WHERE WITEL = '$request->WITEL' AND PLEVEL1 = '$request->FILTER') as FEB22")
			)
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('PLEVEL1', '=', $request->FILTER)
                        ->groupBy('PLEVEL2')
                        ->get();
		
		 $grafik1 = DB::table("PROFIL_LOSS")
                ->select(
                    '*',
                    DB::raw("SUM(IF(BULAN='202101',JUMLAH,0)) as JAN21"),
                    DB::raw("SUM(IF(BULAN='202102',JUMLAH,0)) as FEB21"),
                    DB::raw("SUM(IF(BULAN='202103',JUMLAH,0)) as MAR"),
                    DB::raw("SUM(IF(BULAN='202104',JUMLAH,0)) as APR"),
                    DB::raw("SUM(IF(BULAN='202105',JUMLAH,0)) as MEI"),
                    DB::raw("SUM(IF(BULAN='202106',JUMLAH,0)) as JUN"),
                    DB::raw("SUM(IF(BULAN='202107',JUMLAH,0)) as JUL"),
                    DB::raw("SUM(IF(BULAN='202108',JUMLAH,0)) as AUG"),
                    DB::raw("SUM(IF(BULAN='202109',JUMLAH,0)) as SEP"),
                    DB::raw("SUM(IF(BULAN='202110',JUMLAH,0)) as OCT"),
                    DB::raw("SUM(IF(BULAN='202111',JUMLAH,0)) as NOV"),
                    DB::raw("SUM(IF(BULAN='202112',JUMLAH,0)) as DES"),
	                DB::raw("SUM(IF(BULAN='202201',JUMLAH,0)) as JAN22"),
                    DB::raw("SUM(IF(BULAN='202202',JUMLAH,0)) as FEB22")
                )
		 ->where('WITEL', '=', $request->WITEL)
                 ->where('PLEVEL1', '=', $request->FILTER)
                ->groupBy('PLEVEL2')
                ->get();
        }
        

        return view('profil', compact('bulan','filter','allData','data','grafik','bulanA','grafik1'));
    }
}
