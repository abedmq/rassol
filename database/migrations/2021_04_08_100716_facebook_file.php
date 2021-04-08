<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacebookFile extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::connection('facebook')->create('files', function (Blueprint $table) {
            $table->id();

            $table->string('file_name');
            $table->string('file_path');
            $table->integer('file_line')->default(0);
            $table->integer('total_line');
            $table->boolean('is_reading')->default(0);
            $table->boolean('status')->default(0);

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
        Schema::connection('facebook')->dropIfExists('files');
    }
}
