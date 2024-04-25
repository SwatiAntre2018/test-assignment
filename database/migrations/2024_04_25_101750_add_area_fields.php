<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('country_id')->nullable(); // FK for Country, allow nulls
            $table->unsignedBigInteger('state_id')->nullable(); // FK for State, alllow nulls
            $table->unsignedBigInteger('city_id')->nullable(); // FK for City, allow nulls

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('users_country_id_foreign');
            $table->dropColumn('country_id');
            $table->dropForeign('users_state_id_foreign');
            $table->dropColumn('state_id');
            $table->dropForeign('users_city_id_foreign');
            $table->dropColumn('city_id');
        });
    }
}
