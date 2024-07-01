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
        Schema::create('consultation', function (Blueprint $table) {
            $table->char('code_pers', 32);
            $table->integer('doc_id');
            $table->dateTime('date_consultation');
            $table->primary(['code_pers', 'doc_id']);
            $table->timestamps();

            $table->foreign('code_pers')->references('code_pers')->on('personnel')->onDelete('cascade');
            $table->foreign('doc_id')->references('doc_id')->on('document')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation');
    }
};
