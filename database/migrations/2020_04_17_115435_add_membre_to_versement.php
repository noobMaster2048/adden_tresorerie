<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMembreToVersement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('versements', function (Blueprint $table) {
            $table->unsignedInteger('membre_id')->nullable()->index();
            $table->unsignedInteger('montant')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('versements', function (Blueprint $table) {
            $table->dropColumn(['membre_id', 'montant']);
        });
    }
}
