<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCiviliteMembre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membres', function (Blueprint $table) {
            $table->string('civilite')->nullable();
            $table->string('sexe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membres', function (Blueprint $table) {
           $table->dropColumn(['civilite', 'sexe']);
        });
    }
}
