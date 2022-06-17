<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion', 300);
            $table->foreignId('id_dueno')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_estado')->nullable()->references('id')->on('estados_recurso')->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('id_grupo')->references('id')->on('grupos')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_arrendatario')->nullable()->references('id')->on('users')->nullable()->onUpdate('cascade')->nullOnDelete();
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
