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
        Schema::create('presentation', function (Blueprint $table) {
            $table->integer('code_pres')->primary();
            $table->string('code_bureau', 128);
            $table->string('photo_chef', 128);
            $table->text('message');
            $table->text('cursus_ing')->nullable();
            $table->text('grille_ing')->nullable();
            $table->text('science_ing')->nullable();
            $table->text('grille_science')->nullable();
            $table->foreign('code_bureau')->references('code_bureau')->on('bureau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentation');
    }
};
