<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dossier_Kuadran;
use App\Exports\DossierKuadranExport;
use Maatwebsite\Excel\Facades\Excel;

class DossierKuadran extends Controller
{
    //
    public function index()
    {
        $data_dossier = DB::table('DOSSIER_KUADRAN')->paginate();

        return view('master_data.dossier_kuadran.index', [
            'data_dossier' => $data_dossier
        ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        $cari1 = DB::table('DOSSIER_KUADRAN')
            ->where('KAWASAN', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('master_data.dossier_kuadran.index', ['cari1' => $cari1]);
    }

    public function tambah(){
        return view('master_data.dossier_kuadran.tambah');
    }

    public function simpan(Request $request){
        $this->_validation($request);

        DB::table('DOSSIER_KUADRAN')->insert([
            [
                'NOTEL' => $request->NOTEL,
                'KAWASAN' => $request->KAWASAN,
                'ND_REF' => $request->ND_REF,
                'WITEL' => $request->WITEL,
                'DATEL' => $request->DATEL,
                'STO' => $request->STO,
                'GROUP_IH' => $request->KAWASAN,
                'KWADRAN_INDIHOME' => $request->KWADRAN_INDIHOME,
                'KWADRAN_INTERNET' => $request->KAWASAN,
                'CITEM' => $request->CITEM,
                'SPEED' => $request->SPEED
            ],
        ]);

        return redirect()->route('dossier_kuadran')->with('message', 'Data Berhasil Disimpan');;
    }

    // edit data
    public function edit($NOTEL) {
        $data_dossier = DB::table('DOSSIER_KUADRAN')->where('NOTEL', $NOTEL)->first();

        return view('master_data.dossier_kuadran.edit', ['data_dossier' => $data_dossier]);
    }

    public function update(Request $request, $NOTEL){
        $this->_validation($request);

        DB::table('DOSSIER_KUADRAN')->where('NOTEL', $NOTEL)->update([
                'KAWASAN' => $request->KAWASAN,
                'WITEL' => $request->WITEL,
                'STO' => $request->STO,
                'NOTEL' => $request->NOTEL,
                'ND_REF' => $request->ND_REF,
                'DATEL' => $request->DATEL,
                'GROUP_IH' => $request->KAWASAN,
                'KWADRAN_INDIHOME' => $request->KWADRAN_INDIHOME,
                'KWADRAN_INTERNET' => $request->KAWASAN,
                'CITEM' => $request->CITEM,
                'SPEED' => $request->SPEED
        ]);
        return redirect()->route('dossier_kuadran')->with('message', 'Data berhasil diupdate');
    }

     // hapus data
    public function delete($NOTEL)
    {
        DB::table('DOSSIER_KUADRAN')->where('NOTEL', $NOTEL)->delete();

        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }

    // validasi
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'NOTEL' => 'required|max:100',
                'KAWASAN' => 'required|max:100',
                'ND_REF' => 'required|max:100',
                'WITEL' => 'required|max:100',
                'DATEL' => 'required|max:100',
                'STO' => 'required|max:100',
                'GROUP_IH' => 'required|max:100',
                'KWADRAN_INDIHOME' => 'required|max:100',
                'KWADRAN_INTERNET' => 'required|max:100',
                'CITEM' => 'required|max:100',
                'SPEED' => 'required|max:100',
            ]
        );
    }

    public function exportExcel() 
    {
        return Excel::download(new DossierKuadranExport, 'DossierKuadran.xlsx');
    }
}
