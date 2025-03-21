<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOficinasTable extends Migration
{
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('encargado')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oficinas');
    }
}
