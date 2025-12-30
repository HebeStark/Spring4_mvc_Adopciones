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
        Schema::create('adopciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('adoptante_id');
            $table->date('fecha_adopcion');
            $table->timestamps();

            $table->foreign('animal_id')
                ->references('id')
                ->on('animales')
                ->cascadeOnDelete()
                ->unique();

            $table->foreign('adoptante_id')
                ->references('id')
                ->on('adoptantes')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adopciones');
    }
};
