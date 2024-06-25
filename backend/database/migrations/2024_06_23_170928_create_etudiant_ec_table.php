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
        Schema::create('etudiant_ec', function (Blueprint $table) {
            $table->string('code_user', 32);
            $table->string('code_ec', 32);
            $table->primary(['code_user', 'code_ec']);
            $table->foreign('code_user')->references('code_user')->on('users');
            $table->foreign('code_ec')->references('code_ec')->on('ec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant_ec');
    }
};
