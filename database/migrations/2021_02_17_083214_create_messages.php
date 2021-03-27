<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessages extends Migration {

    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            //
            $table->text('text');
            $table->string('type')->default("text");
            $table->string('url')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->boolean('sending_error')->default(0);

            $table->timestamps();
        });

        Schema::create("message_group", function (Blueprint $table) {
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('group_id');
            $table->string('whatsapp_id');
            $table->timestamp('sending_at')->nullable();
            $table->timestamp('deliver_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('revoked_id')->nullable();
            $table->primary(['message_id', 'group_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('message_group');
    }
}