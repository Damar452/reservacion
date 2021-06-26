<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedeATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede_a', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_dia');
            $table->Integer('id_horario');
            $table->Integer('1');
            $table->Integer('2');
            $table->Integer('3');
            $table->Integer('4');
            $table->Integer('5');
            $table->Integer('6');
            $table->Integer('7');
            $table->Integer('8');
            $table->Integer('9');
            $table->Integer('10');
            $table->Integer('11');
            $table->Integer('12');
            $table->Integer('13');
            $table->Integer('14');
            $table->Integer('15');
            $table->Integer('16');
            $table->Integer('17');
            $table->Integer('18');
            $table->Integer('19');
            $table->Integer('20');
            $table->Integer('21');
            $table->Integer('AUD');
            $table->Integer('MC1');
            $table->Integer('ME1');
            $table->Integer('S01');
            $table->Integer('S02');
            $table->Integer('S03');
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
        Schema::dropIfExists('sede_a');
    }
}
