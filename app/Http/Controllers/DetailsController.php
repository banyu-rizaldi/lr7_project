<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Details;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    //
    //
    public function index(Request $request)
    {

        $data = DB::table("SUMMARY1")
                ->select('*')
                ->groupBy('WITEL')
                ->get();
        
        $datakw = DB::table("SUMMARY1")
                ->select(DB::raw('DISTINCT BULAN'))
                ->get();

        $ldate = date('Ym');
        
        $bulan = DB::table("SUMMARY1")
                ->select(DB::raw('DISTINCT BULAN'))
                ->where('BULAN','=',$ldate)
                ->get();
        // dd($datakw);

        $allData = DB::table("SUMMARY1")
                ->select(
                    '*',
                    DB::raw("SUM(TOTAL_LIS) as lis"),
                    DB::raw("SUM(TOTAL_ALERT) as alert"),
                    DB::raw("SUM(CHURN4+CT09) as loss"),
                    DB::raw("SUM(TOTAL_SALES) as sales"),
                    DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                    DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                    DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
                    DB::raw("SUM(KW1) as kw1"),
                    DB::raw("SUM(KW2) as kw2"),
                    DB::raw("SUM(KW3) as kw3"),
                    DB::raw("SUM(KW4) as kw4"),
                    DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                    DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                    DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                    DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                )
                ->where('BULAN','=', $ldate)
                ->groupBy('WITEL')
                ->get();
        
        $allData1 = DB::table("SUMMARY1")
                ->select(
                    '*',
                    DB::raw("SUM(TOTAL_LIS) as lis"),
                    DB::raw("SUM(TOTAL_ALERT) as alert"),
                    DB::raw("SUM(CHURN4+CT09) as loss"),
                    DB::raw("SUM(TOTAL_SALES) as sales"),
                    DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                    DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
			        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
                    DB::raw("SUM(KW1) as kw1"),
                    DB::raw("SUM(KW2) as kw2"),
                    DB::raw("SUM(KW3) as kw3"),
                    DB::raw("SUM(KW4) as kw4"),
                    DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                    DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                    DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                    DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                )
                ->where('BULAN','=', $ldate)
                ->get();

	$allData2 = DB::table("SUMMARY1")
            ->select(
                '*',
                DB::raw("SUM(TOTAL_LIS) as lis"),
                DB::raw("SUM(TOTAL_ALERT) as alert"),
                DB::raw("SUM(CHURN4+CT09) as loss"),
                DB::raw("SUM(TOTAL_SALES) as sales"),
                DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                DB::raw("SUM(CT09) as ct0"),
                DB::raw("SUM(CHURN4) as caps"),
                DB::raw("SUM(KW1) as kw1"),
                DB::raw("SUM(KW2) as kw2"),
                DB::raw("SUM(KW3) as kw3"),
                DB::raw("SUM(KW4) as kw4"),
                DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
            )
            ->get();


        $grafik = DB::table("SUMMARY1")
                ->select(
                    '*',
                    DB::raw("SUM(TOTAL_LIS) as lis"),
                    DB::raw("SUM(TOTAL_ALERT) as alert"),
                    DB::raw("SUM(CHURN4+CT09) as loss"),
                    DB::raw("SUM(TOTAL_SALES) as sales"),
		            DB::raw("SUM(TARGET_SALES) as tsales"),
                    DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                    DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                    DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			        DB::raw("SUM(KW1) as kw1"),
                    DB::raw("SUM(KW2) as kw2"),
                    DB::raw("SUM(KW3) as kw3"),
                    DB::raw("SUM(KW4) as kw4"),
                    DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                    DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                    DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                    DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                )
                ->groupBy('BULAN')
                ->get();
        
	$grafiks = DB::table("SUMMARY1")
                ->select("WITEL","STO",
                    DB::raw("SUM(IF(BULAN='202101',kw4,0))/SUM(IF(BULAN='202101',total_LIS,0)) as TOTAL_LIS_202101"),
                    DB::raw("SUM(IF(BULAN='202102',kw4,0))/SUM(IF(BULAN='202102',total_LIS,0)) as TOTAL_LIS_202102"),
                    DB::raw("SUM(IF(BULAN='202103',kw4,0))/SUM(IF(BULAN='202103',total_LIS,0)) as TOTAL_LIS_202103"),
                    DB::raw("SUM(IF(BULAN='202104',kw4,0))/SUM(IF(BULAN='202104',total_LIS,0)) as TOTAL_LIS_202104"),
                    DB::raw("SUM(IF(BULAN='202105',kw4,0))/SUM(IF(BULAN='202105',total_LIS,0)) as TOTAL_LIS_202105"),
                    DB::raw("SUM(IF(BULAN='202106',kw4,0))/SUM(IF(BULAN='202106',total_LIS,0)) as TOTAL_LIS_202106"),
                    DB::raw("SUM(IF(BULAN='202107',kw4,0))/SUM(IF(BULAN='202107',total_LIS,0)) as TOTAL_LIS_202107"),
                    DB::raw("SUM(IF(BULAN='202108',kw4,0))/SUM(IF(BULAN='202108',total_LIS,0)) as TOTAL_LIS_202108"),
                    DB::raw("SUM(IF(BULAN='202109',kw4,0))/SUM(IF(BULAN='202109',total_LIS,0)) as TOTAL_LIS_202109"),
                    DB::raw("SUM(IF(BULAN='202110',kw4,0))/SUM(IF(BULAN='202110',total_LIS,0)) as TOTAL_LIS_202110"),
                    DB::raw("SUM(IF(BULAN='202111',kw4,0))/SUM(IF(BULAN='202111',total_LIS,0)) as TOTAL_LIS_202111"),
                    DB::raw("SUM(IF(BULAN='202112',kw4,0))/SUM(IF(BULAN='202112',total_LIS,0)) as TOTAL_LIS_202112"),
		            DB::raw("SUM(IF(BULAN='202201',kw4,0))/SUM(IF(BULAN='202201',total_LIS,0)) as TOTAL_LIS_202201"),
                    DB::raw("SUM(IF(BULAN='202202',kw4,0))/SUM(IF(BULAN='202202',total_LIS,0)) as TOTAL_LIS_202202"),
                    DB::raw("SUM(IF(BULAN='202203',kw4,0))/SUM(IF(BULAN='202203',total_LIS,0)) as TOTAL_LIS_202203")
                )
                ->groupBy('WITEL')
                ->get();

        // dd($grafik);

        if ($request->WITEL) {
            $allData = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                        DB::raw("SUM(CHURN4) as caps"),
			            DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('WITEL','=',$request->WITEL)
                    ->groupBy('STO')
                    ->get();
            

            $allData1 = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('WITEL','=',$request->WITEL)
                    ->groupBy('WITEL')
                    ->get();

           $grafik = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("SUM(TARGET_SALES) as tsales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('WITEL','=',$request->WITEL)
                    ->groupBy('BULAN')
                    ->get();

	 $bulan = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as churn"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('BULAN','=',$request->BULAN)
                    ->groupBy('WITEL')
                    ->get();

	
	$grafiks = DB::table("SUMMARY1")
                    ->select("WITEL","STO",
                        DB::raw("SUM(IF(BULAN='202101',kw4,0))/SUM(IF(BULAN='202101',total_LIS,0)) as TOTAL_LIS_202101"),
                        DB::raw("SUM(IF(BULAN='202102',kw4,0))/SUM(IF(BULAN='202102',total_LIS,0)) as TOTAL_LIS_202102"),
                        DB::raw("SUM(IF(BULAN='202103',kw4,0))/SUM(IF(BULAN='202103',total_LIS,0)) as TOTAL_LIS_202103"),
                        DB::raw("SUM(IF(BULAN='202104',kw4,0))/SUM(IF(BULAN='202104',total_LIS,0)) as TOTAL_LIS_202104"),
                        DB::raw("SUM(IF(BULAN='202105',kw4,0))/SUM(IF(BULAN='202105',total_LIS,0)) as TOTAL_LIS_202105"),
                        DB::raw("SUM(IF(BULAN='202106',kw4,0))/SUM(IF(BULAN='202106',total_LIS,0)) as TOTAL_LIS_202106"),
                        DB::raw("SUM(IF(BULAN='202107',kw4,0))/SUM(IF(BULAN='202107',total_LIS,0)) as TOTAL_LIS_202107"),
                        DB::raw("SUM(IF(BULAN='202108',kw4,0))/SUM(IF(BULAN='202108',total_LIS,0)) as TOTAL_LIS_202108"),
                        DB::raw("SUM(IF(BULAN='202109',kw4,0))/SUM(IF(BULAN='202109',total_LIS,0)) as TOTAL_LIS_202109"),
                        DB::raw("SUM(IF(BULAN='202110',kw4,0))/SUM(IF(BULAN='202110',total_LIS,0)) as TOTAL_LIS_202110"),
                        DB::raw("SUM(IF(BULAN='202111',kw4,0))/SUM(IF(BULAN='202111',total_LIS,0)) as TOTAL_LIS_202111"),
                        DB::raw("SUM(IF(BULAN='202112',kw4,0))/SUM(IF(BULAN='202112',total_LIS,0)) as TOTAL_LIS_202112"),
                        DB::raw("SUM(IF(BULAN='202201',kw4,0))/SUM(IF(BULAN='202201',total_LIS,0)) as TOTAL_LIS_202201"),
			DB::raw("SUM(IF(BULAN='202202',kw4,0))/SUM(IF(BULAN='202202',total_LIS,0)) as TOTAL_LIS_202202"),
			DB::raw("SUM(IF(BULAN='202203',kw4,0))/SUM(IF(BULAN='202203',total_LIS,0)) as TOTAL_LIS_202203")
		    )
                    ->where('WITEL','=',$request->WITEL)
                    ->groupBy('STO')
                    ->get();
        
        }

        if ($request->BULAN) {
            $allData = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('BULAN','=',$request->BULAN)
                    ->groupBy('WITEL')
                    ->get();
            

            $allData1 = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('BULAN','=',$request->BULAN)
                    ->groupBy('BULAN')
                    ->get();
            
            $bulan = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('BULAN','=',$request->BULAN)
                    ->groupBy('WITEL')
                    ->get();
	
		

        }

        if ($request->WITEL && $request->BULAN) {
            $allData = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('WITEL','=',$request->WITEL)
                    ->where('BULAN','=',$request->BULAN)
                    ->groupBy('STO')
                    ->get();
            

            $allData1 = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(CHURN4+CT09) as loss"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(CHURN4+CT09)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(CT09) as ct0"),
                    DB::raw("SUM(CHURN4) as caps"),
			DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->where('WITEL','=',$request->WITEL)
                    ->where('BULAN','=',$request->BULAN)
                    ->groupBy('WITEL')
                    ->get();
        }


        return view('index', [
            'data'=>$data,'allData'=>$allData,'allData1'=>$allData1,'datakw'=>$datakw,'grafik'=>$grafik,
		'grafiks'=>$grafiks,
		'bulan'=>$bulan,
		'allData2'=>$allData2
        ]);
    }

    public function info()
    {
        return view('info');
    }

}

