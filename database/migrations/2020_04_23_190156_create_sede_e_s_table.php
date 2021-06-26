<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedeESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede_e', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_dia');
            $table->Integer('id_horario');
            $table->Integer('1');
            $table->Integer('2');
            $table->Integer('3GIM');
            $table->Integer('IFI');
            $table->Integer('LCB');
            $table->Integer('LCC');
            $table->Integer('LMO');
            $table->Integer('LPC');
            $table->Integer('NRH');
            $table->Integer('SMU');
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
        Schema::dropIfExists('sede_e');
    }
}
