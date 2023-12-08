<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoliks', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->string('liczba_osob');
            $table->string('status')->default('wolne');
            $table->string('lokalizacja');
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
        Schema::dropIfExists('stoliks');
    }
};
