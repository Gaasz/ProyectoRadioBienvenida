<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaHoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_hora', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dia_id');
            $table->unsignedBigInteger('hora_id');

            $table->foreign('hora_id')->references('id')->on('horas')->onDelete('cascade');
            $table->foreign('dia_id')->references('id')->on('dias')->onDelete('cascade');

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
        Schema::dropIfExists('dia_hora');
    }
}
