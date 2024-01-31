<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen');
            $table->double('precio', 8, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora');
            $table->enum('duracion', ['Menos de 1 hora','1 a 2 horas','2 a 3 horas','Mas de 3 horas']);
            $table->enum('expiracion', ['Proximo', 'Pasado'])->default('Proximo');
            $table->text('qr_code')->nullable;
            $table->string('url_stripe');
            $table->timestamps();

            $table->foreignId('estate_id')->constrained('estates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
