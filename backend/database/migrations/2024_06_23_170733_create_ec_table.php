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
        Schema::create('ec', function (Blueprint $table) {
            $table->string('code_ec', 32)->primary();
            $table->string('intitule_ec', 128);
            $table->smallInteger('code_sem');
            $table->string('code_filiere', 32);
            $table->text('desc_ec')->nullable();
            $table->foreign('code_sem')->references('code_sem')->on('semestre');
            $table->foreign('code_filiere')->references('code_filiere')->on('filiere');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ec');
    }
};
