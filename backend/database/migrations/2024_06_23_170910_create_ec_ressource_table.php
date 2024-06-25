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
            $table->char('code_ec', 32);
            $table->smallInteger('code_res', 1);
            $table->char('code_pers', 32);
            $table->primary(['code_ec', 'code_res', 'code_pers']);
            $table->foreign('code_ec')->references('code_ec')->on('ec');
            $table->foreign('code_res')->references('code_res')->on('ressource');
            $table->foreign('code_pers')->references('code_pers')->on('personnel');
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
