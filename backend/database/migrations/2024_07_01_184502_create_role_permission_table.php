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
            $table->integer('id');
            $table->smallInteger('code_role');
            $table->timestamps();

            $table->foreign('role_permission_permission')->references('code_permis')->on('role_permission')->onDelete('cascade');
            $table->foreign('role_permission_role')->references('code_permis')->on('role_permission')->onDelete('cascade');

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
