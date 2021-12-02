<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            //id_anuncio unsignedBigInteger
            $table->unsignedBigInteger('id_anid_anuncio',20);
            //string 150 to store archivo_audio
            $table->string('archivo_audio', 150);
            //string 150 to store archivo_texto
            $table->string('archivo_texto', 150);
            //unsigned bigitn 20 to store cotizacion_id
            $table->unsignedBigInteger('cotizacion_id');
            //foreign key to cotizacion delte on cascade
            $table->foreign('cotizacion_id')->references('id_cotizacion')->on('cotizaciones')->onDelete('cascade');
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
        Schema::dropIfExists('anuncios');
    }
}
