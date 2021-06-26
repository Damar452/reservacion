<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('sede');
            $table->string('espacio');
            $table->date('fecha');
            $table->unsignedBigInteger('hora_inicio');
            $table->unsignedBigInteger('hora_fin');
            $table->string('motivo');
            $table->Integer('estado')->default('0');
            $table->Integer('finalizada')->default('0');
            $table->string('salon')->nullable($value = true);
            $table->string('mensaje')->nullable($value = true);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('hora_inicio')->references('id')->on('horarios');
            $table->foreign('hora_fin')->references('id')->on('horarios');
            $table->foreign('user_id')->references('id')->on('user_estandars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
