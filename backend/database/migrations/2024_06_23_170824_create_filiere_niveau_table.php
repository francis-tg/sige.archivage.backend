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
        Schema::create('filiere_niveau', function (Blueprint $table) {
            $table->char('code_filiere', 32);
            $table->char('code_niveau', 32);
            $table->char('code_ins', 32);
            $table->primary(['code_filiere', 'code_niveau', 'code_ins']);
            $table->foreign('code_filiere')->references('code_filiere')->on('filiere');
            $table->foreign('code_niveau')->references('code_niveau')->on('niveau');
            $table->foreign('code_ins')->references('code_ins')->on('inscription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiere_niveau');
    }
};