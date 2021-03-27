<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration {

    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');

            //
            $table->string('label')->nullable();
            $table->string('owner')->nullable();
            $table->string('subject')->nullable();
            $table->timestamp('creation')->nullable();
            $table->timestamp('subjectTime')->nullable();
            $table->string('subjectOwner')->nullable();
            $table->string('remote_id')->unique();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('group_user', function (Blueprint $table) {
            $table->integer("user_id");
            $table->integer("group_id");

            $table->primary(["user_id", "group_id"]);
        });

        Schema::create('contact_group', function (Blueprint $table) {
            $table->integer("contact_id");
            $table->integer("group_id");
            $table->primary(["contact_id", "group_id"]);

        });

        Schema::create('group_admin', function (Blueprint $table) {
            $table->integer("contact_id");
            $table->integer("group_id");
            $table->string("admin_type");
            $table->primary(["contact_id", "group_id"]);

        });


    }

    public function down()
    {
        Schema::dropIfExists('groups');
        Schema::dropIfExists('group_user');
        Schema::dropIfExists('contact_group');
        Schema::dropIfExists('group_admin');
    }
}