<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FacebookPalestine extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::connection('facebook')->create('palestine_users', function (Blueprint $table) {
            $table->id();

            $table->string('column_1')->nullable();
            $table->string('column_2')->nullable();
            $table->string('column_3')->nullable();
            $table->string('column_4')->nullable();
            $table->string('column_5')->nullable();
            $table->string('column_6')->nullable();
            $table->string('column_7')->nullable();
            $table->string('column_8')->nullable();
            $table->string('column_9')->nullable();
            $table->string('column_10')->nullable();
            $table->string('column_11')->nullable();
            $table->string('column_12')->nullable();
            $table->string('column_13')->nullable();
            $table->string('column_14')->nullable();
            $table->string('column_15')->nullable();
            $table->string('column_16')->nullable();
            $table->string('column_17')->nullable();
            $table->string('column_18')->nullable();
            $table->string('column_19')->nullable();
            $table->string('column_20')->nullable();
            $table->string('column_21')->nullable();
            $table->string('column_22')->nullable();
            $table->string('column_23')->nullable();
            $table->string('column_24')->nullable();
            $table->string('column_25')->nullable();
            $table->string('column_26')->nullable();
            $table->string('column_27')->nullable();
            $table->string('column_28')->nullable();
            $table->string('column_29')->nullable();
            $table->string('column_30')->nullable();
            $table->string('column_31')->nullable();
            $table->string('column_32')->nullable();
            $table->string('column_33')->nullable();
            $table->string('column_34')->nullable();
            $table->boolean('checked')->default(0);

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
    }
}
