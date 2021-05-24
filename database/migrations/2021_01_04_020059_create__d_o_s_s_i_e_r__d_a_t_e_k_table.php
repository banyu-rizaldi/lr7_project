<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDOSSIERDATEKTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Dossier_Datek', function (Blueprint $table) {
            $table->string('NOTEL', 100);
            $table->string('abrv_art', 100);
            $table->string('Iart', 100);
            $table->string('Itarif', 100);
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
        Schema::dropIfExists('Dossier_Datek');
    }
}
