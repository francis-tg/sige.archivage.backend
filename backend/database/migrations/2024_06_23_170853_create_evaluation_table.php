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
        Schema::create('evaluation', function (Blueprint $table) {
            $table->char('code_eval', 32)->primary();
            $table->string('code_ec', 32);
            $table->smallInteger('code_annee');
            $table->char('code_session', 32);
            $table->smallInteger('note_eval')->nullable();
            $table->text('remarque_eval')->nullable();
            $table->dateTime('date_eval');
            $table->string('code_user', 32);
            $table->foreign('code_ec')->references('code_ec')->on('ec');
            $table->foreign('code_annee')->references('code_annee')->on('anneescolaire');
            $table->foreign('code_session')->references('code_session')->on('session_examen');
            $table->foreign('code_user')->references('code_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation');
    }
};
