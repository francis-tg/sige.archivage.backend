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
            $table->char('code_user', 32);
            $table->smallInteger('code_dip', 1);
            $table->date('annee_dip');
            $table->string('institution_dip', 128);
            $table->string('mention_dip', 128);
            $table->string('pays_dip', 128);
            $table->primary(['code_user', 'code_dip']);
            $table->foreign('code_user')->references('code_user')->on('users');
            $table->foreign('code_dip')->references('code_dip')->on('diplome');
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
