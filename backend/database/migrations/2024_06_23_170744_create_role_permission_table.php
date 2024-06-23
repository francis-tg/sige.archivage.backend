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
            $table->smallInteger('code_role');
            $table->smallInteger('code_permis');
            $table->primary(['code_role', 'code_permis']);
            $table->foreign('code_role')->references('code_role')->on('role');
            $table->foreign('code_permis')->references('code_permis')->on('permission');
            $table->timestamps();
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
