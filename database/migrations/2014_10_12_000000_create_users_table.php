<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('no_folio')->unique()->nullable();
            $table->string('no_empleado')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->date('nacimiento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('curp')->nullable();
            $table->string('cedula')->unique()->nullable();
            $table->string('especialidad')->nullable();
            $table->string('status')->nullable();
            $table->string('area')->nullable();
            $table->integer('user_type');
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
