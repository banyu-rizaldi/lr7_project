<?php

namespace App\Exports;

// use App\Dossier_Kuadran;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DossierKuadranExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('DOSSIER_KUADRAN')->paginate(100);
    }

    public function map($data): array
    {
        return [
            $data->KAWASAN,
            $data->WITEL,
            $data->STO,
            $data->NOTEL,
            $data->ND_REFERENCE,
            $data->PRODUCT,
            $data->PLBLCL,
            $data->CPROD,
            $data->GROUP_INDIHOME,
            $data->LINECATS_FAMILY_LNAME,
            $data->TECHNO,
            $data->REVENUE_TREMS,
            $data->REVENUE_REF,
            $data->KWADRAN_INDIHOME,
            $data->KWADRAN_INET,
            $data->KWADRAN_POTS,
            $data->IS_CT0,
            $data->CITEM,
            $data->SPEED,
            $data->NCLI,
            $data->NDOS,
        ];
    }
    public function headings(): array
    {
        return [
            'KAWASAN',
            'WITEL',
            'STO',
            'NOTEL',
            'ND_REFERENCE',
            'PRODUCT',
            'PLBLCL',
            'CPROD',
            'GROUP_INDIHOME',
            'LINECATS_FAMILY_LNAME',
            'TECHNO',
            'REVENUE_TREMS',
            'REVENUE_REF',
            'KWADRAN_INDIHOME',
            'KWADRAN_INET',
            'KWADRAN_POTS',
            'IS_CT0',
            'CITEM',
            'SPEED',
            'NCLI',
            'NDOS',
        ];
    }
}
