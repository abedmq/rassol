<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration {

    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');

            //
            $table->string('title');
            $table->timestamps();
        });
        if (env('APP_ENV') == 'local')
        {
            \App\Models\Tag::create(['title' => 'اهتمام ']);
            \App\Models\Tag::create(['title' => 'اهتمام 1']);
            \App\Models\Tag::create(['title' => 'اهتمام 2']);
            \App\Models\Tag::create(['title' => 'اهتمام 3']);
            \App\Models\Tag::create(['title' => 'اهتمام 4']);
            \App\Models\Tag::create(['title' => 'اهتمام 5']);
        }
    }

    public function down()
    {
        Schema::dropIfExists('tags');
    }
}