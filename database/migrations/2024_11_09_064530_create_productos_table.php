<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Definición correcta de la clave primaria bigint
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->string('imagen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

