<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    public function __construct()
    {
        // set_time_limit(800000000);
    }

    public function index()
    {
        $getWitel = DB::table("SUMMARY1")
                    ->select('WITEL')
                    ->groupBy('WITEL')
                    ->get();
        
        $getBulan = DB::table("ALERT")
                    ->select('BULAN_ALERT')
                    ->groupBy('BULAN_ALERT')
                    ->get();

        $getAtribut = DB::table("ALERT")
                    ->select('atribut')
                    ->groupBy('atribut')
                    ->get();
        

        
        $getData  = DB::table("ALERT")
            ->select("WITEL","STO","ATRIBUT","BULAN_ALERT",
                DB::raw("COUNT(*) as TOTAL_ALERT"),
                DB::raw("SUM(IF(STATUS='Open',1,0)) as Open"),
                DB::raw("SUM(IF(STATUS='Uncontacted',1,0)) as Uncontacted"),
                DB::raw("SUM(IF(STATUS='Contacted',1,0)) as Contacted"),
                DB::raw("SUM(IF(STATUS='Closed',1,0)) as Closed"),
                DB::raw("SUM(IF(STATUS='Open',1,0))*100/COUNT(*) as 'PtgOpen'"),
                DB::raw("SUM(IF(STATUS='Contacted',1,0))*100/COUNT(*) as 'PtgContacted'"),
                DB::raw("SUM(IF(STATUS='Uncontacted',1,0))*100/COUNT(*) as 'PtgUncontacted'"),
                DB::raw("SUM(IF(STATUS='Closed',1,0))*100/COUNT(*) as 'PtgClosed'")
            )
            ->groupBy("WITEL","STO")
            ->get();

        return view('report.summary.index',[
            'getData' => $getData,
            'getWitel' => $getWitel
        ]);
        
    }

    public function detil(Request $request)
    {
        $getWitel = DB::table("SUMMARY1")
                    ->select('WITEL')
                    ->groupBy('WITEL')
                    ->get();

        if ($request->WITEL) {
            $getWitel = DB::table("SUMMARY1")
                    ->select('WITEL')
                    ->groupBy('WITEL')
                    ->get();

            $getData  = DB::table("ALERT")
                ->select("*",
                    DB::raw("COUNT(*) as TOTAL_ALERT"),
                    DB::raw("SUM(IF(STATUS='Open',1,0)) as Open"),
                    DB::raw("SUM(IF(STATUS='Uncontacted',1,0)) as Uncontacted"),
                    DB::raw("SUM(IF(STATUS='Contacted',1,0)) as Contacted"),
                    DB::raw("SUM(IF(STATUS='Closed',1,0)) as Closed"),
                    DB::raw("SUM(IF(STATUS='Open',1,0))*100/COUNT(*) as 'PtgOpen'"),
                    DB::raw("SUM(IF(STATUS='Contacted',1,0))*100/COUNT(*) as 'PtgContacted'"),
                    DB::raw("SUM(IF(STATUS='Uncontacted',1,0))*100/COUNT(*) as 'PtgUncontacted'"),
                    DB::raw("SUM(IF(STATUS='Closed',1,0))*100/COUNT(*) as 'PtgClosed'")
                )
                ->where("WITEL", $request->WITEL)
                ->groupBy("STO")
                ->get();
            
            return view('report.summary.index',[
                    'getData' => $getData,
                    'getWitel' => $getWitel
            ]);
        }else {
            $getWitel = DB::table("SUMMARY1")
                    ->select('WITEL')
                    ->groupBy('WITEL')
                    ->get();

            $getData  = DB::table("ALERT")
                        ->select("*",
                            DB::raw("COUNT(*) as TOTAL_ALERT"),
                            DB::raw("SUM(IF(STATUS='Open',1,0)) as Open"),
                            DB::raw("SUM(IF(STATUS='Uncontacted',1,0)) as Uncontacted"),
                            DB::raw("SUM(IF(STATUS='Contacted',1,0)) as Contacted"),
                            DB::raw("SUM(IF(STATUS='Closed',1,0)) as Closed"),
                            DB::raw("SUM(IF(STATUS='Open',1,0))*100/COUNT(*) as 'PtgOpen'"),
                            DB::raw("SUM(IF(STATUS='Contacted',1,0))*100/COUNT(*) as 'PtgContacted'"),
                            DB::raw("SUM(IF(STATUS='Uncontacted',1,0))*100/COUNT(*) as 'PtgUncontacted'"),
                            DB::raw("SUM(IF(STATUS='Closed',1,0))*100/COUNT(*) as 'PtgClosed'")
                        )
                        ->groupBy("WITEL")
                        ->get();

            return view('report.summary.index',[
                'getData' => $getData,
                'getWitel' => $getWitel
            ]);
        }
    }

    public function getSto(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table("SUMMARY1")
                ->where($select,$value)
                ->groupBy($dependent)
                ->get();
        // $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        $output = '<option value=""> </option>';
        foreach ($data as $row) {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;

        // return json_encode($data);
    }
}
