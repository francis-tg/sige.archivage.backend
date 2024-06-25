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
        Schema::create('bureau', function (Blueprint $table) {
            $table->string('code_bureau', 128)->primary();
            $table->string('label_div', 128);
            $table->text('desc_div')->nullable();
            $table->string('type_bureau', 128);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bureau');
    }
};
