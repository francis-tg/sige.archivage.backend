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
        Schema::create('quitus', function (Blueprint $table) {
            $table->char('code_quitus', 32)->primary();
            $table->string('code_user', 32);
            $table->string('intitule_quitus', 128);
            $table->text('desc_quitus')->nullable();
            $table->dateTime('date_quitus');
            $table->boolean('statut_quitus');
            $table->foreign('code_user')->references('code_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quitus');
    }
};
