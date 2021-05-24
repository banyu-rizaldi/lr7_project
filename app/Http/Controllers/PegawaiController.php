<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Illuminate\Support\Str;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;


class PegawaiController extends Controller
{
    //
    public function index()
    {
        $pegawai = Pegawai::all();

        return view('master_data.user.index',['pegawai' => $pegawai]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_depan' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:5',
            'agama' => 'required',
        ]);

        // 
        $user = new \App\User;
        $user->role = 'pegawai';
        $user->name = $request->nama_depan;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->remember_token = Str::random(60);
        $user->save();

        // insert ke tabel
        $request->request->add(['user_id' => $user->id]);
        $pegawai = Pegawai::create($request->all());

        return redirect('/pegawai')->with('message', 'Data Berhasil diinput');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('master_data.user.edit',['pegawai' => $pegawai]);
    }

    public function update(Request $request,Pegawai $pegawai)
    {

        $pegawai->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move(public_path('images/'),$request->file('avatar')->getClientOriginalName());
            $pegawai->avatar = $request->file('avatar')->getClientOriginalName();
            $pegawai->save();
        }
        return redirect('/pegawai')->with('message', 'Data Berhasil diedit');
    }

    public function delete(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('/pegawai')->with('message', 'Data Berhasil didelete');
    }

    public function profile(Pegawai $pegawai)
    {
        return view('master_data.user.profile',['pegawai'=>$pegawai]);
    }

    public function exportExcel() 
    {
        return Excel::download(new PegawaiExport, 'Pegawai.xlsx');
    }

    public function exportPdf()
    {
        $pegawai = Pegawai::all();
        $pdf = PDF::loadView('export.pegawaipdf',['pegawai' => $pegawai]);
        return $pdf->download('pegawai.pdf');
    }

    public function importExcel(Request $request)
    {
        Excel::import(new PegawaiImport,$request->file('data_pegawai'));
        
        return back();
    }
}
