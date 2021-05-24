<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier_Kuadran extends Model
{
    //
    protected $table = 'DOSSIER_KUADRAN';

    protected $fillable = [
        'KAWASAN', 'WITEL', 'STO', 'NOTEL', 'ND_REFERENCE', 'PRODUCT',
        'PLBLCL', 'CPROD', 'GROUP_INDIHOME', 'LINECATS_FAMILY_LNAME',
        'TECHNO', 'REVENUE_TREMS', 'REVENUE_REF', 'KWADRAN_INDIHOME',
        'KWADRAN_INET', 'KWADRAN_POTS', 'IS_CT0', 'CITEM', 'SPEED',
        'NCLI', 'NDOS', 'BULAN'
    ];

}
