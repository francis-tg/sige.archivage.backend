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
        Schema::create('users_diplome', function (Blueprint $table) {
            $table->string('code_user', 32);
            $table->smallInteger('code_dip');
            $table->date('date_obtention_dip');
            $table->primary(['code_user', 'code_dip']);
            $table->foreign('code_user')->references('code_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_diplome');
    }
};
