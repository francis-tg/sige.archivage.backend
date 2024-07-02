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
        Schema::create('filiere', function (Blueprint $table) {
            $table->char('code_filiere', 32);
            $table->string('code_bureau', 128);
            $table->string('label_filiere', 128);
            $table->text('desc_filiere')->nullable();
            $table->primary('code_filiere');
            $table->foreign('code_bureau')->references('code_bureau')->on('bureau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiere');
    }
};