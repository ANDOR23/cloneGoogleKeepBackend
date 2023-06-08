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
        #EL ESQUEMA DE LA BASE DE DATOS, AQUÍ SE MODIFICAN CIERTOS CRITERIOS DEL CAMPO, 
        #EJEMPLO, EL CAMPO 'TITLE' Y 'CONTENT' ADMITEN VALORES NULOS MIENTRAS QUE LOS DEMÁS NO
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->boolean('pinned');
            $table->boolean('archived');
            $table->string('color');
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
        Schema::dropIfExists('notes');
    }
};
