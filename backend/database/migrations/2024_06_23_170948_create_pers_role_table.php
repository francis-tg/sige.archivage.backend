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
        Schema::create('pers_role', function (Blueprint $table) {
            $table->string('code_pers', 32);
            $table->smallInteger('code_role');
            $table->primary(['code_pers', 'code_role']);
            $table->foreign('code_pers')->references('code_user')->on('users');
            $table->foreign('code_role')->references('code_role')->on('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pers_role');
    }
};
