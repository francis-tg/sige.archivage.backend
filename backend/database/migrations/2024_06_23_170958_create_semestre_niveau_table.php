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
        Schema::create('semestre_niveau', function (Blueprint $table) {
            $table->smallInteger('code_sem');
            $table->string('code_niveau', 32);
            $table->primary(['code_sem', 'code_niveau']);
            $table->foreign('code_sem')->references('code_sem')->on('semestre');
            $table->foreign('code_niveau')->references('code_niveau')->on('niveau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semestre_niveau');
    }
};
