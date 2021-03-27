<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration {

    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id');

            //
            $table->string('title');
            $table->timestamps();
        });

        if (env('APP_ENV') == 'local')
        {
            \App\Models\Field::create(['title' => 'مجال 1']);
            \App\Models\Field::create(['title' => 'مجال 2']);
        }
    }

    public function down()
    {
        Schema::dropIfExists('fields');
    }
}