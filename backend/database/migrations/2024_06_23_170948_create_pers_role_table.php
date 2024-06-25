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
            $table->smallInteger('code_role', 1);
            $table->string('code_bureau', 128);
            $table->char('code_pers', 32);
            $table->date('date_debut_role');
            $table->date('date_fin_role')->nullable();
            $table->smallInteger('satut_role');
            $table->primary(['code_role', 'code_bureau', 'code_pers']);
            $table->foreign('code_role')->references('code_role')->on('role');
            $table->foreign('code_bureau')->references('code_bureau')->on('bureau');
            $table->foreign('code_pers')->references('code_pers')->on('personnel');
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
