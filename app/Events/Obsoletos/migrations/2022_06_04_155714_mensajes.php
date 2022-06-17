<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mensajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('texto',200);
            $table->boolean('visto');
            //$table->timestamp('fecha_hora');
            $table->foreignId('id_autor')->references('id')->on('users')->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('id_conversacion')->references('id')->on('conversaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->binary('imagen')->nullable();
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
