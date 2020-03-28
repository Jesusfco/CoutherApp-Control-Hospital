<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paciente_id');
            $table->bigInteger('medico_id');
            $table->string('telefono')->nullable();
            $table->text('alergias')->nullable();
            //Tabla de numeros Datos
            $table->string('TA')->nullable();
            $table->double('peso')->nullable();
            $table->double('talla')->nullable();
            $table->double('temperatura')->nullable();
            $table->double('IMC')->nullable();
            $table->double('SPO2')->nullable();
            $table->double('FC')->nullable();
            $table->double('FR')->nullable();
            $table->string('DXTX')->nullable();
            //------------------------------------------------
            $table->text('p')->nullable();
            $table->text('s')->nullable();
            $table->text('o')->nullable();
            $table->text('a')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('pronostico')->nullable();
            $table->text('plan')->nullable();
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
        Schema::dropIfExists('controls');
    }
}
