<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetails extends Migration {

    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            //
            $table->string('whatsapp_name')->nullable();
            $table->string('lc')->nullable();
            $table->string('lg')->nullable();
            $table->string('platform')->nullable();
            $table->string('wid')->nullable();
            $table->string('battery')->nullable();
            $table->string('phone_model')->nullable();
            $table->string('phone_man')->nullable();
            $table->string('phone_os')->nullable();
            $table->string('tos')->nullable();
            $table->string('connected')->nullable();
            $table->string('is24h')->nullable();
            $table->integer('field_id')->nullable();
            $table->integer('max_groups_manage')->default(10)->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
//            $table->integer('detail_id')->nullable();
//            $table->foreign('detail_id')->references('id')->on('user_details');

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_details');
        Schema::table('users', function (Blueprint $table) {
//            $table->dropColumn('detail_id');
        });
    }
}