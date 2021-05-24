<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NossServiceInfo extends Controller
{
    //
    public function index()
    {
        $data_noss = DB::table('noss_service_info')->paginate(5);

        return view('master_data.noss_service_info.index', [
            'data_noss' => $data_noss
        ]);
    }

    public function tambah()
    {
        return view('master_data.noss_service_info.tambah');
    }

    public function simpan(Request $request)
    {
        $this->_validation($request);

        DB::table('noss_service_info')->insert([
            [
                'NOTEL' => $request->NOTEL,
                'TECHNOLOGY' => $request->TECHNOLOGY,
                'STP_TARGET' => $request->STP_TARGET,
                'STP_PORT' => $request->STP_PORT,
                'SP_TARGET' => $request->SP_TARGET,
                'SP_PORT' => $request->SP_PORT,
                'SERVICE_STATUS' => $request->SERVICE_STATUS,
            ],
        ]);

        return redirect()->route('noss_service_info')->with('message', 'Data Berhasil Disimpan');;
    }

    // edit data
    public function edit($NOTEL)
    {
        $data_noss = DB::table('noss_service_info')->where('NOTEL', $NOTEL)->first();

        return view('master_data.noss_service_info.edit', ['data_noss' => $data_noss]);
    }

    public function update(Request $request, $NOTEL)
    {
        $this->_validation($request);

        DB::table('noss_service_info')->where('NOTEL', $NOTEL)->update([
            'NOTEL' => $request->NOTEL,
            'TECHNOLOGY' => $request->TECHNOLOGY,
            'STP_TARGET' => $request->STP_TARGET,
            'STP_PORT' => $request->STP_PORT,
            'SP_TARGET' => $request->SP_TARGET,
            'SP_PORT' => $request->SP_PORT,
            'SERVICE_STATUS' => $request->SERVICE_STATUS,
        ]);
        return redirect()->route('noss_service_info')->with('message', 'Data berhasil diupdate');
    }

    // hapus data
    public function delete($NOTEL)
    {
        DB::table('noss_service_info')->where('NOTEL', $NOTEL)->delete();

        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }

    // validasi
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'NOTEL' => 'required|max:100',
                'TECHNOLOGY' => 'required|max:100',
                'STP_TARGET' => 'required|max:100',
                'STP_PORT' => 'required|max:100',
                'SP_TARGET' => 'required|max:100',
                'SP_PORT' => 'required|max:100',
                'SERVICE_STATUS' => 'required|max:100',
            ]
            // [
            //     'NOTEL.required' => 'Maksimal 100 digit',
            //     'KAWASAN.required' => 'Maksimal 100 digit',
            //     'ND_REF.required' => 'Maksimal 100 digit',
            //     'WITEL.required' => 'Maksimal 100 digit',
            //     'DATEL.required' => 'Maksimal 100 digit',
            //     'STO.required' => 'Maksimal 100 digit',
            //     'GROUP_IH.required' => 'Maksimal 100 digit',
            //     'KWADRAN_INDIHOME.required' => 'Maksimal 100 digit',
            //     'KWADRAN_INTERNET.required' => 'Maksimal 100 digit',
            //     'CITEM.required' => 'Maksimal 100 digit',
            //     'SPEED.required' => 'Maksimal 100 digit',
            // ]
        );
    }
}
