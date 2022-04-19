<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        set_time_limit(300);
    }
    //
    public function index()
    {
        $getWitel = DB::table("SUMMARY1")
            ->select('WITEL')
            ->groupBy('WITEL')
            ->get();

        // dd($getWitel);
        
        $getAtribut = DB::table("ALERT")
            ->select('*')
            ->groupBy('ATRIBUT')
            ->get();

        
        $getStatus = DB::table("ALERT")
            ->select('*')
            ->groupBy('STATUS')
            ->get();

        return view('master_data.alert.index', compact(
                'getWitel',
                'getAtribut',
                'getStatus'
            ));
    }

    public function alert(Request $request)
    {
        // dd($request->all());

        $getData  = DB::table("ALERT")
                    ->select('*')
                    ->where('NOTEL', '=', $request->NOTEL)
                    ->where('WITEL', '=', $request->WITEL)
                    ->where('STO', '=', $request->STO)
                    ->where('ATRIBUT', '=', $request->ATRIBUT)
                    ->where('STATUS', '=', $request->STATUS)
                    ->groupBy('WITEL', 'STO', 'ATRIBUT', 'ALERT')
                    ->get();

        $getData1  = DB::table("ALERT")
            ->select('WITEL')
            ->where('WITEL', '=', $request->WITEL)
            ->groupBy('WITEL')
            ->get();
        
        $getData2  = DB::table("ALERT")
            ->select('ATRIBUT')
            ->where('ATRIBUT', '=', $request->ATRIBUT)
            ->groupBy('ATRIBUT')
            ->get();
        
        $getData3  = DB::table("ALERT")
            ->select('STATUS')
            ->where('STATUS', '=', $request->STATUS)
            ->groupBy('STATUS')
            ->get();

        $getData4  = DB::table("ALERT")
            ->select('STO')
            ->where('STO', '=', $request->STO)
            ->groupBy('STO')
            ->get();

        if ($request->WITEL) {
            $getData  = DB::table("ALERT")
                ->select('*')
                ->where('WITEL', '=', $request->WITEL)
                ->groupBy('WITEL', 'STO', 'ATRIBUT', 'ALERT')
                ->get();
            
                if ($request->ATRIBUT){
                    $getData  = DB::table("ALERT")
                        ->select('*')
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('STO', '=', $request->STO)
                        ->where('ATRIBUT', '=', $request->ATRIBUT)
                        ->get();
                    
                }
                
                if ($request->STATUS){
                    $getData  = DB::table("ALERT")
                        ->select('*')
                        ->where('WITEL', '=', $request->WITEL)
                        ->where('STO', '=', $request->STO)
                        ->where('ATRIBUT', '=', $request->ATRIBUT)
                        ->where('STATUS', '=', $request->STATUS)
                        ->get();
                    
                }

        }
        else {
            $getData  = DB::table("ALERT")
                    ->select('*')
                    ->where('WITEL', '=', $request->WITEL)
                    ->where('STO', '=', $request->STO)
                    ->where('ATRIBUT', '=', $request->ATRIBUT)
                    ->where('STATUS', '=', $request->STATUS)
                    ->groupBy('WITEL', 'STO', 'ATRIBUT', 'ALERT')
                    ->get();

        }

        return view('master_data.alert.details', [
            'getData' => $getData,
            'getData1' => $getData1,
            'getData2' => $getData2,
            'getData3' => $getData3,
            'getData4' => $getData4
        ]);
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

    public function detil(Request $request,$NOTEL)
    {
        // dd($NOTEL);

        $getData  = DB::table("ALERT")
                    ->select('*')
                    ->where('NOTEL', '=', $NOTEL)
                    ->groupBy('STO')
                    ->get();

        return view('master_data.alert.details', ['getData' => $getData]);
    }

    public function view($NOTEL)
    {
        // dd($request->ATRUBUT);

        $getData  = DB::table("ALERT")
                    ->select('*')
                    ->where('NOTEL', '=', $NOTEL)
                    ->groupBy('WITEL', 'STO', 'ATRIBUT', 'ALERT')
                    ->get();

        return view('master_data.alert.view', ['getData' => $getData]);
    }


    public function edit($NOTEL, $ATRIBUT)
    {
        $alert = DB::table('ALERT')
                ->select('*')
                ->where('NOTEL', $NOTEL)
                ->where('ATRIBUT', $ATRIBUT)
                ->first();

        // dd($alert);

        return view('master_data.alert.edit', ['alert' => $alert]);
    }

    public function update(Request $request, $NOTEL)
    {
        $this->_validation($request);

        // dd($request->all());

        if($request->hasFile('FILE')){
            
            $save= DB::table('ALERT')->where('NOTEL', $NOTEL)
                    ->where('ATRIBUT', $request->ATRIBUT)
                    ->update([
                        'STATUS' => $request->STATUS,
                        'DESKRIPSI' => $request->DESKRIPSI,
                        'NAMA_PEMILIK' => $request->NAMA_PEMILIK,
                        'RELASI' => $request->RELASI,
                        'EMAIL' => $request->EMAIL,
                        'PHONE' => $request->PHONE,
                        'FILE' => $request->file('FILE')->move('images/',$request->file('FILE')->getClientOriginalName())
                    ]);

            
            return redirect()->route('alert2',$NOTEL)->with('message', 'Data berhasil diupdate');

        }else{
            DB::table('ALERT')->where('NOTEL', $NOTEL)
                    ->where('ATRIBUT', $request->ATRIBUT)
                    ->update([
                        'STATUS' => $request->STATUS,
                        'DESKRIPSI' => $request->DESKRIPSI,
                        'NAMA_PEMILIK' => $request->NAMA_PEMILIK,
                        'RELASI' => $request->RELASI,
                        'EMAIL' => $request->EMAIL,
                        'PHONE' => $request->PHONE
            ]);

            return redirect()->route('alert2',$NOTEL)->with('message', 'Data berhasil diupdate');
        }

        return redirect()->route('alert2',$NOTEL)->with('message', 'Data berhasil diupdate');
    }

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'NOTEL' => 'required|max:100',
                'WITEL' => 'required|max:100',
                'STO' => 'required|max:100',
                'BULAN_ALERT' => 'required|max:100',
                'ATRIBUT' => 'required|max:100',
                'TGL_PS' => 'required|max:100',
                'AGE' => 'required|max:100',
                'ALERT' => 'required|max:100',
                'SCORE' => 'required|max:100',
                'STATUS' => 'required|max:100',
                'DESKRIPSI' => 'max:100',
                'NAMA_PEMILIK' => 'max:100',
                'RELASI' => 'max:100',
                'EMAIL' => 'max:100',
                'PHONE' => 'max:100',
                'FILE' => 'mimes:jpeg,jpg,png,gif',
            ]
        );
    }

    public function age()
    {
        return view('master_data.alert.age');
    }
    
    public function witel()
    {
        return view('master_data.alert.witel');
    }
}
