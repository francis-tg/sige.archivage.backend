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
        Schema::create('quitus', function (Blueprint $table) {
            $table->char('code_ins', 32);
            $table->integer('code_tranche');
            $table->smallInteger('code_mode');
            $table->string('numero_quitus', 128);
            $table->date('date_paiement');
            $table->smallInteger('statut_quitus');
            $table->primary(['code_ins', 'code_tranche', 'code_mode']);
            $table->foreign('code_ins')->references('code_ins')->on('inscription');
            $table->foreign('code_tranche')->references('code_tranche')->on('tranche');
            $table->foreign('code_mode')->references('code_mode')->on('modepaiment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quitus');
    }
};
