<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noss_Service_Info extends Model
{
    //
    protected $table = 'noss_service_info';

    protected $fillable = [
        'NOTEL', 'TECHNOLOGY', 'STP_TARGET', 'STP_PORT', 'SP_TARGET',
        'SP_PORT', 'SERVICE_STATUS',
    ];
}
