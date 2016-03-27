<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressFieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('street_address', 100)->nullable();;
            $table->string('city', 50)->nullable();;
            $table->string('state', 2)->nullable();;
            $table->string('zip_code', 10)->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('street_address');
            $table->removeColumn('city');
            $table->removeColumn('state');
            $table->removeColumn('zip_code');
        });
    }
}
