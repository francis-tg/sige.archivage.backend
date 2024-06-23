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
        Schema::create('ec_ressource', function (Blueprint $table) {
            $table->string('code_ec', 32);
            $table->smallInteger('code_res');
            $table->primary(['code_ec', 'code_res']);
            $table->foreign('code_ec')->references('code_ec')->on('ec');
            $table->foreign('code_res')->references('code_res')->on('ressource');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ec_ressource');
    }
};
