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
        Schema::create('document', function (Blueprint $table) {
            $table->char('document_id', 12)->primary();
            $table->char('cathegorie_id', 12);
            $table->string('titre', 50);
            $table->string('auteur', 100);
            $table->string('date_creation', 50);
            $table->string('date_derniere_mod', 50);
            $table->string('type', 50);
            $table->string('resume', 500)->nullable();
            $table->integer('taille');
            $table->string('reference', 100);
            $table->string('emplacement_doc', 100);
            $table->string('status_doc', 100);
            $table->timestamps();

            $table->foreign('cathegorie_id')->references('cathegorie_id')->on('cathegorie')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
