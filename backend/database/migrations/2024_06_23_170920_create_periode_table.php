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
        Schema::create('periode', function (Blueprint $table) {
            $table->char('code_salle', 32);
            $table->char('code_ec', 32);
            $table->smallInteger('code_periode')->nullable();
            $table->date('debut_periode');
            $table->smallInteger('jour_periode');
            $table->date('fin_periode');
            $table->smallInteger('duree_periode');
            $table->primary(['code_salle', 'code_ec']);
            $table->foreign('code_salle')->references('code_salle')->on('salle');
            $table->foreign('code_ec')->references('code_ec')->on('ec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode');
    }
};
