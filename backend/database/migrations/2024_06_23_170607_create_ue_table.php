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
        Schema::create('ue', function (Blueprint $table) {
            $table->char('code_ue', 32)->primary();
            $table->smallInteger('code_sem');
            $table->string('intitule_ue', 128);
            $table->text('desc_ue')->nullable();
            $table->foreign('code_sem')->references('code_sem')->on('semestre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ue');
    }
};
