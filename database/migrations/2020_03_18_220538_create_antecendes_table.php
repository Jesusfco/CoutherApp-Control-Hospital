<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecendesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paciente_id');
            $table->bigInteger('medico_id');
            // $table->text('alergias')->nullable();
            $table->text('heredofamiliares')->nullable();
            $table->text('personales_no_patologicos')->nullable();
            $table->text('personales_patologicos')->nullable();
            $table->text('musculo_esqueletico')->nullable();
            $table->text('piel_anexos')->nullable();
            // exploracion_fisica
            $table->double('peso')->nullable();
            $table->text('mm_hg')->nullable();
            $table->double('temperatura')->nullable();
            $table->double('frecuencia_respiratoria')->nullable();
            $table->double('frecuencia_cardiaca')->nullable();
            $table->double('talla')->nullable();
            // ----------------
            $table->text('habitus_exterior')->nullable();
            $table->text('cabeza')->nullable();
            $table->text('cuello')->nullable();
            $table->text('torax')->nullable();
            $table->text('abdomen')->nullable();
            $table->text('genitales')->nullable();
            // INTERROGACION POR APARATOR Y SISTEMAS
            $table->text('sintomas_generales')->nullable();
            $table->text('respiratorio')->nullable();
            $table->text('cardiovascular')->nullable();
            $table->text('digestivo')->nullable();
            $table->text('urinario')->nullable();
            $table->text('reproductor')->nullable();
            $table->text('hemolinfatico')->nullable();
            $table->text('endocrino')->nullable();
            $table->text('sistema_nervioso')->nullable();
            $table->text('exploracion_ginecologica')->nullable();
            $table->text('columna_vertebral')->nullable();
            $table->text('extremidades')->nullable();
            $table->text('exploracion_neurologica')->nullable();
            $table->text('diagnostico')->nullable();
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
        Schema::dropIfExists('antecedentes');
    }
}
