<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    //
    protected $table = 'SUMMARY1';

    protected $fillable = [
        'KAWASAN', 'WITEL', 'STO', 'TOTAL_LIS', 'TOTAL_CHURN', 'TOTAL_ALERT',
        'TOTAL_SALES', 'ALERT1', 'ALERT2', 'ALERT3',
        'ALERT4','BULAN'
    ];

    
}
