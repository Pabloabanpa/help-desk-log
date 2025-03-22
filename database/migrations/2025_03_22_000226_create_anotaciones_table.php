<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotacionesTable extends Migration
{
    public function up()
    {
        Schema::create('anotaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atencion_id');
            $table->unsignedBigInteger('tecnico');
            $table->string('descripcion', 200);
            $table->string('material_usado', 50)->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('anotaciones');
    }
}

