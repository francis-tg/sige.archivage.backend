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
            $table->string('code_filiere', 32)->primary();
            $table->string('nom_filiere', 128);
            $table->text('desc_filiere')->nullable();
            $table->string('type_filiere', 128)->nullable();
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
