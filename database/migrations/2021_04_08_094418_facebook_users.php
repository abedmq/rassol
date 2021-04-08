<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacebookUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */

//    protected $connection = 'facebook';

    public function up()
    {
        //
        Schema::connection('facebook')->create('users', function (Blueprint $table) {
            $table->id();

            $table->string('mobile')->unique();
            $table->string('facebook_id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable();
            $table->string('social_status')->nullable();
            $table->string('job')->nullable();
            $table->string('graduate_year')->nullable();
            $table->string('column_10')->nullable();
            $table->string('column_11')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('checked')->default(0);


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::connection('facebook')->dropIfExists('users');
    }
}
