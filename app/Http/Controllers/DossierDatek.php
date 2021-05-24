<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DossierDatek extends Controller
{
    //
    // tampil data
    public function index()
    {

        $data_datek = DB::table('DOSSIER_DATEK')->paginate(9);

        return view('master_data.dossier_datek.index', ['data_datek' => $data_datek]);
    }

    // tampil tambah data
    public function tambah()
    {
        return view('master_data.dossier_datek.tambah');
    }

    // simpan data
    public function simpan(Request $request)
    {
        $this->_validation($request);

        DB::table('DOSSIER_DATEK')->insert([
            [
                'ND' => $request->ND,
                'ND_REFERENCE' => $request->ND_REFERENCE,
                'LGEST' => $request->LGEST,
                'LCAT' => $request->LCAT,
                'ABRV_ART' => $request->ABRV_ART,
                'LART' => $request->LART,
                'LTARIF' => $request->LTARIF,
                'DATEL' => $request->DATEL,
                'BULAN' => $request->BULAN,
            ],
        ]);

        return redirect()->route('dossier_datek')->with('message', 'Data Berhasil Disimpan');
    }

    // edit data
    public function edit($NOTEL)
    {
        $data_datek = DB::table('DOSSIER_DATEK')->where('NOTEL', $NOTEL)->first();

        return view('master_data.dossier_datek.edit', ['data_datek' => $data_datek]);
    }

    public function update(Request $request, $NOTEL)
    {
        $this->_validation($request);
        DB::table('DOSSIER_DATEK')->where('NOTEL', $NOTEL)->update([
                'NOTEL' => $request->NOTEL,
                'abrv_art' => $request->abrv_art,
                'Iart' => $request->Iart,
                'Itarif' => $request->Itarif,
        ]);
        return redirect()->route('dossier_datek')->with('message', 'Data berhasil diupdate');
    }

    // hapus data
    public function delete($NOTEL)
    {
        DB::table('DOSSIER_DATEK')->where('NOTEL', $NOTEL)->delete();

        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }

    // validasi
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'NOTEL' => 'required|max:100',
                'abrv_art' => 'required|max:100',
                'Iart' => 'required|max:100',
                'Itarif' => 'required|max:100',
            ]
            // [
            //     'NOTEL.required' => 'Harus diisi',
            //     'abrv_art.required' => 'Harus diisi',
            //     'Iart.required' => 'Harus diisi',
            //     'Itarif.required' => 'Harus diisi',
            // ]
        );
    }
}
