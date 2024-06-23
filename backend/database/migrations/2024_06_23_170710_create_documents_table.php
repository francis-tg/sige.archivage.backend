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
            $table->char('code_doc', 32)->primary();
            $table->string('code_user', 32);
            $table->string('intitule_doc', 128);
            $table->text('desc_doc')->nullable();
            $table->dateTime('date_up_doc');
            $table->string('url_doc', 128);
            $table->string('type_doc', 128);
            $table->boolean('statut_doc');
            $table->foreign('code_user')->references('code_user')->on('users');
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
