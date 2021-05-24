<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDOSSIERKUADRANTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DOSSIER_KUADRAN', function (Blueprint $table) {
            $table->string('NOTEL', 100);
            $table->string('KAWASAN', 100);
            $table->string('ND_REF', 100);
            $table->string('WITEL', 100);
            $table->string('DATEL', 100);
            $table->string('STO', 100);
            $table->string('GROUP_IH', 100);
            $table->string('KWADRAN_INDIHOME', 100);
            $table->string('KWADRAN_INTERNET', 100);
            $table->string('CITEM', 100);
            $table->string('SPEED', 100);
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
        Schema::dropIfExists('DOSSIER_KUADRAN');
    }
}
