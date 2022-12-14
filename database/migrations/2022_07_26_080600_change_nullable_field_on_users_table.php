<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableFieldOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('address_one')->nullable()->change();
            $table->text('address_two')->nullable()->change();
            $table->integer('provinces_id')->nullable()->change();
            $table->integer('regencies_id')->nullable()->change();
            $table->string('zip_code')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('store_name')->nullable()->change();
            $table->integer('categories_id')->nullable()->change();
            $table->integer('store_status')->nullable()->change();
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
            $table->text('address_one')->nullable(false)->change();
            $table->text('address_two')->nullable(false)->change();
            $table->integer('provinces_id')->nullable()->change();
            $table->integer('regencies_id')->nullable(false)->change();
            $table->string('zip_code')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('store_name')->nullable(false)->change();
            $table->integer('categories_id')->nullable(false)->change();
            $table->integer('store_status')->nullable(false)->change();
        });
    }
}
