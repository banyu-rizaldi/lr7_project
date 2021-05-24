<?php

namespace App\Exports;

use App\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PegawaiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pegawai::all();
    }

    public function map($pegawai): array
    {
        return [
            $pegawai->nama_lengkap(),
            $pegawai->jenis_kelamin,
            $pegawai->agama,
            $pegawai->alamat,
        ];
    }
    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Jenis Kelamin',
            'Agama',
            'Alamat',
        ];
    }
}
