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
            $table->integer('doc_id')->primary();
            $table->integer('id_cat');
            $table->string('code_bureau', 128);
            $table->char('titre', 32);
            $table->char('auteur', 32);
            $table->char('date_creation', 32);
            $table->char('date_der_mod', 32);
            $table->char('type', 32);
            $table->char('resumé', 32)->nullable();
            $table->char('reference', 32);
            $table->char('emplacement_doc', 32);
            $table->char('status_doc', 32);
            $table->float('taille', 5);
            $table->timestamps();


            $table->foreign('code_bureau')->references('code_bureau')->on('bureau')->onDelete('cascade');
            $table->foreign('id_cat')->references('id_cat')->on('categorie')->onDelete('cascade');
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
