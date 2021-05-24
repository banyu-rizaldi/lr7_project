<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Pegawai;

class PegawaiImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
            if ($key >= 3) {
                Pegawai::create([
                    'nama_depan' => $row[1],
                    'nama_belakang' => ' ',
                    'jenis_kelamin' =>$row[2],
                    'agama' =>$row[3],
                    'alamat' =>$row[4],
                ]);
            }
            
        }
    }
}
