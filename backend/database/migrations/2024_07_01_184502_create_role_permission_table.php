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
        Schema::create('role_permission', function (Blueprint $table) {
            $table->smallInteger('code_permis')->primary();
            $table->integer('code_role');
            $table->timestamps();

            $table->foreign('code_permis')->references('code_permis')->on('permission')->onDelete('cascade');
            $table->foreign('code_role')->references('code_role')->on('role')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permission');
    }
};
