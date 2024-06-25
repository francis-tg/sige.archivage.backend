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
        Schema::create('salle', function (Blueprint $table) {
            $table->string('code_salle', 32)->primary();
            $table->smallInteger('nb_place_salle');
            $table->boolean('etat_salle');
            $table->text('desc_salle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salle');
    }
};
