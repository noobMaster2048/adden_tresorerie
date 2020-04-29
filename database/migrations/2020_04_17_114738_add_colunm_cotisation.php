<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmCotisation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotisations', function (Blueprint $table) {
            $table->date('date_cotisation')->nullable();
            $table->unsignedBigInteger('montant_initial')->nullable();
            $table->unsignedBigInteger('montant')->nullable();
            $table->string('periode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotisations', function (Blueprint $table) {
           $table->dropColumn(['date_cotisation', 'montant_initial', 'montant', 'periode']);
        });
    }
}
