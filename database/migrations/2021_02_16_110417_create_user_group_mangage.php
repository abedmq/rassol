<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupMangage extends Migration {

    public function up()
    {
        Schema::create('user_group_manage', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('group_id');
            $table->primary(['user_id', 'group_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_group_manage');
    }
}