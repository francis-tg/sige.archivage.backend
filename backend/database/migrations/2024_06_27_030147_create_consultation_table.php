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
            $table->char('consultation_id', 12)->primary();
            $table->char('document_id', 12);
            $table->char('service_id', 12);
            $table->char('cathegorie_id', 12);
            $table->foreign('document_id')->references('document_id')->on('document');
            $table->foreign('service_id')->references('service_id')->on('service');
            $table->foreign('cathegorie_id')->references('cathegorie_id')->on('cathegorie');
            $table->timestamps();
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
