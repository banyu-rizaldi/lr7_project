<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier_Datek extends Model
{
    //
    protected $table = 'Dossier_Datek';

    protected $fillable = [
        'NOTEL', 'abrv_art', 'Iart', 'Itarif',
    ];
}
