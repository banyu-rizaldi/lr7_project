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
                ->select('*')
                ->groupBy('BULAN')
                ->get();

        if ($request->WITEL) {
            $allData = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(TOTAL_CHURN) as churn"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_LIS)) AS B"),
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
                        DB::raw("SUM(TOTAL_CHURN) as churn"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_LIS)) AS B"),
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

        } elseif ($request->WITEL == '') {
            $allData = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(TOTAL_CHURN) as churn"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_LIS)) AS B"),
                        DB::raw("SUM(KW1) as kw1"),
                        DB::raw("SUM(KW2) as kw2"),
                        DB::raw("SUM(KW3) as kw3"),
                        DB::raw("SUM(KW4) as kw4"),
                        DB::raw("(SUM(KW1)/SUM(TOTAL_LIS)) AS v"),
                        DB::raw("(SUM(KW2)/SUM(TOTAL_LIS)) AS w"),
                        DB::raw("(SUM(KW3)/SUM(TOTAL_LIS)) AS x"),
                        DB::raw("(SUM(KW4)/SUM(TOTAL_LIS)) AS y")
                    )
                    ->groupBy('WITEL')
                    ->get();
            
            $allData1 = DB::table("SUMMARY1")
                    ->select(
                        '*',
                        DB::raw("SUM(TOTAL_LIS) as lis"),
                        DB::raw("SUM(TOTAL_ALERT) as alert"),
                        DB::raw("SUM(TOTAL_CHURN) as churn"),
                        DB::raw("SUM(TOTAL_SALES) as sales"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_SALES)) AS A"),
                        DB::raw("(SUM(TOTAL_CHURN)/SUM(TOTAL_LIS)) AS B"),
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

        } 



        return view('index', ['data'=>$data,'allData'=>$allData,'allData1'=>$allData1,'datakw'=>$datakw]);
    }

    public function info()
    {
        return view('info');
    }

}
