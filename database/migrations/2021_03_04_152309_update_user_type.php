<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserType extends Migration {

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->enum("type", ['admin', 'user'])->default("user");
            $table->integer("admin_id")->nullable();
            $table->integer("sub_user_max")->default(3);
            $table->timestamp("active_at")->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn("type");
            $table->dropColumn("sub_user_max");
            $table->dropColumn("active_at");
            $table->dropColumn("admin_id");
        });
    }
}