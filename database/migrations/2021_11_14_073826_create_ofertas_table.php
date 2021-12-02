<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            //fecha inicio y fin
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            //valor y cantidad
            $table->unsignedInteger('valor');
            $table->unsignedInteger('cantidad');
            //porcentaje de descuento
            $table->unsignedInteger('porcentaje_descuento');
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
        Schema::dropIfExists('ofertas');
    }
}
