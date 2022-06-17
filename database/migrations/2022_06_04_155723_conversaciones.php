<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Conversaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interlocutorx')->nullable()->references('id')->on('users')->onUpdate('cascade')->nullOnDelete();
            $table->foreignId('interlocutory')->nullable()->references('id')->on('users')->onUpdate('cascade')->nullOnDelete();
            $table->tinyInteger('nivelConsideracion'); //1 o 2
            $table->timestamps();
            $table->unique(['interlocutorx', 'interlocutory']);
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
