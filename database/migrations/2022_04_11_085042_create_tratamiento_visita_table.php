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
        Schema::create('tratamiento_visita', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('tratamiento_id')->nullable();
            $table->unsignedBigInteger('visita_id')->nullable();

            $table->foreign('tratamiento_id')
             ->references('id')
             ->on('tratamientos')
             ->onDelete('set null');

            $table->foreign('visita_id')
             ->references('id')
             ->on('visitas')
             ->onDelete('set null');

            
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
        Schema::dropIfExists('tratamiento_visita');
    }
};
