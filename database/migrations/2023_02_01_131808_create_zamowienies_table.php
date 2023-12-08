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
        Schema::create('zamowienies', function (Blueprint $table) {
            $table->id();
            $table->string('imie')->nullable();
            $table->string('nazwisko')->nullable();
            $table->string('email')->nullable();
            $table->string('nr_telefonu')->nullable();
            $table->string('potrawy')->nullable();
            $table->string('adres')->nullable();
            $table->decimal('cena',10,2)->nullable();
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
        Schema::dropIfExists('zamowienies');
    }
};
