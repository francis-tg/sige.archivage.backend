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
        Schema::create('examen', function (Blueprint $table) {
            $table->char('code_examen', 32)->primary();
            $table->string('code_sem', 32);
            $table->string('code_ue', 32);
            $table->string('code_session', 32);
            $table->dateTime('date_heure_examen');
            $table->string('salle', 32);
            $table->string('statut_examen', 32);
            $table->text('desc_examen')->nullable();
            $table->foreign('code_sem')->references('code_sem')->on('semestre');
            $table->foreign('code_ue')->references('code_ue')->on('ue');
            $table->foreign('code_session')->references('code_session')->on('session_examen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen');
    }
};
