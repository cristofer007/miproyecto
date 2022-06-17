<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Permisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_carpeta')->references('id')->on('carpetas')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('permiso_descarga');
            $table->boolean('permiso_subida');
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
