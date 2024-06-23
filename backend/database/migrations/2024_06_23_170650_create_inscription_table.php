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
        Schema::create('inscription', function (Blueprint $table) {
            $table->char('code_ins', 32)->primary();
            $table->string('code_user', 32);
            $table->smallInteger('code_annee');
            $table->dateTime('date_ins');
            $table->smallInteger('statut_ins');
            $table->foreign('code_user')->references('code_user')->on('users');
            $table->foreign('code_annee')->references('code_annee')->on('anneescolaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription');
    }
};
