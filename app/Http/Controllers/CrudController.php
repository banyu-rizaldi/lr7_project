<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    // tampil data
    public function index()
    {

        $data_barang = DB::table('data_barang')->paginate(3);

        return view('crud', ['data_barang' => $data_barang]);
    }

    // tampil tambah data
    public function tambah()
    {
        return view('crud-tambah-data');
    }

    // simpan data
    public function simpan(Request $request)
    {
        $this->_validation($request);

        DB::table('data_barang')->insert([
            [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang
            ],
        ]);

        return redirect()->route('crud')->with('message', 'Data Berhasil Disimpan');
    }

    // edit data
    public function edit($id)
    {
        $data_barang = DB::table('data_barang')->where('id', $id)->first();

        return view('crud-edit-data', ['data_barang' => $data_barang]);
    }

    public function update(Request $request, $id)
    {
        $this->_validation($request);
        DB::table('data_barang')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang
        ]);
        return redirect()->route('crud')->with('message', 'Data berhasil diupdate');
    }

    // hapus data
    public function delete($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }

    // validasi
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'kode_barang' => 'required|max:5',
                'nama_barang' => 'required|max:100'
            ],
            [
                'kode_barang.required' => 'Harus diisi',
                'kode_barang.required' => 'Maksimal 5 digit',
                'nama_barang.required' => 'Harus diisi',
                'nama_barang.required' => 'Maksimal 100 digit',
            ]
        );
    }
}
