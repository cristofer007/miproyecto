<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolicitudesRecursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_recursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_recurso')->references('id')->on('recursos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_solicitante')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('peticion');
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
        //
    }
}
