<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiante_grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Id_estudiante')->unsigned();
            $table->integer('Id_grupo')->unsigned();
            $table->foreign('Id_estudiante')->references('id')->on('estudiante');
            $table->foreign('Id_grupo')->references('id')->on('grupo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_grupo');
    }
};
