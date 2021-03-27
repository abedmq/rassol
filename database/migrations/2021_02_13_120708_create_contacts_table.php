<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration {

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');

            //
            $table->string("remote_id")->unique();
            $table->string("name")->nullable();
            $table->string("mobile");
            $table->string("country_code");
            $table->string("image")->nullable();

            $table->timestamps();
        });
        Schema::create('contact_user', function (Blueprint $table) {
            $table->integer("user_id");
            $table->integer("contact_id");
            $table->primary(["user_id", "contact_id"]);
        });

    }


    public function down()
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contact_user');
    }
}