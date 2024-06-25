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
        Schema::create('ec', function (Blueprint $table) {
            $table->char('code_ec', 32)->primary();
            $table->char('code_ue', 32);
            $table->char('intitule_ec', 128);
            $table->smallInteger('credit_ec')->nullable();
            $table->smallInteger('vh_ec')->nullable();
            $table->smallInteger('cm_ec')->nullable();
            $table->smallInteger('td_ec')->nullable();
            $table->smallInteger('tp_ec')->nullable();
            $table->smallInteger('tpe_ec')->nullable();
            $table->foreign('code_ue')->references('code_ue')->on('ue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ec');
    }
};
