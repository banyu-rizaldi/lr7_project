<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNOSSSERVICEINFOTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_n_o_s_s__s_e_r_v_i_c_e__i_n_f_o', function (Blueprint $table) {
            $table->string('NOTEL', 100);
            $table->string('TECHNOLOGY', 100);
            $table->string('STP_TARGET', 100);
            $table->string('STP_PORT', 100);
            $table->string('SP_TARGET', 100);
            $table->string('SP_PORT', 100);
            $table->string('SERVICE_STATUS', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_n_o_s_s__s_e_r_v_i_c_e__i_n_f_o');
    }
}
