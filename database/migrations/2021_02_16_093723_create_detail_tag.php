<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTag extends Migration {

    public function up()
    {
        Schema::create('detail_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('detail_id')->references('id')->on('user_details');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_tag');
    }
}