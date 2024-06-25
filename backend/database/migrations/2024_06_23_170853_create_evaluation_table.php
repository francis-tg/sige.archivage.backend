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
            $table->char('code_ec', 32);
            $table->char('code_examen', 32);
            $table->char('code_user', 32);
            $table->date('date_evaluation');
            $table->char('code_ano', 32)->nullable();
            $table->decimal('note_eval', 10, 2);
            $table->date('date_evalu');
            $table->primary(['code_ec', 'code_examen', 'code_user']);
            $table->foreign('code_ec')->references('code_ec')->on('ec');
            $table->foreign('code_examen')->references('code_examen')->on('examen');
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
