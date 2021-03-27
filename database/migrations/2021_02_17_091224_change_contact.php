<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeContact extends Migration {

    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
            $table->string('status')->nullable();
            $table->string('exits')->nullable();
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
            $table->dropColumn('status');
            $table->dropColumn('exits');
        });
    }
}