<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) 
        {            
            $table->integer('user_id')->primary();
            $table->string('calle')->nullable();
            $table->string('colonia')->nullable();
            $table->integer('numero')->nullable();
            $table->string('numero_int')->nullable();
            $table->integer('cp')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccions');
    }
}
