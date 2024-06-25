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
        Schema::create('users_role', function (Blueprint $table) {
            $table->char('code_user', 32);
            $table->smallInteger('code_role');
            $table->date('date_debut_role');
            $table->date('date_fin_role')->nullable();
            $table->smallInteger('etat_role');
            $table->primary(['code_user', 'code_role']);
            $table->foreign('code_user')->references('code_user')->on('users');
            $table->foreign('code_role')->references('code_role')->on('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_role');
    }
};
