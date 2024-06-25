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
        Schema::create('documents', function (Blueprint $table) {
            $table->char('code_doc', 32);
            $table->char('code_session', 32);
            $table->string('code_bureau', 128);
            $table->string('label_doc', 128);
            $table->text('description_doc')->nullable();
            $table->string('type_doc', 128);
            $table->string('nom_fichier', 128);
            $table->primary('code_doc');
            $table->foreign('code_session')->references('code_session')->on('session_examen');
            $table->foreign('code_bureau')->references('code_bureau')->on('bureau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
