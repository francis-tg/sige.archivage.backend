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
        Schema::create('session_examen', function (Blueprint $table) {
            $table->char('code_session', 32)->primary();
            $table->smallInteger('code_annee');
            $table->string('label_session', 128);
            $table->date('date_debut_session');
            $table->date('date_fin_session')->nullable();
            $table->smallInteger('statut_session');
            $table->foreign('code_annee')->references('code_annee')->on('anneescolaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_examen');
    }
};
