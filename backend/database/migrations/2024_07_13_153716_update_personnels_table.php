<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('statut_mat');
            $table->string('lieu_residence');
            $table->string('first_phone');
            $table->string('second_phone')->nullable();
            $table->string('cni');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('lang')->nullable();
            $table->text('bibliographie')->nullable();
            $table->integer('nb_enfant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->dropColumn([
                'sexe',
                'date_naissance',
                'lieu_naissance',
                'statut_mat',
                'lieu_residence',
                'first_phone',
                'second_phone',
                'cni',
                'photo',
                'lang',
                'bibliographie',
                'nb_enfant',
            ]);
        });
    }
}
