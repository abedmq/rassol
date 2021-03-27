<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->string('go_auth')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('field')->nullable();
            $table->boolean('is_go_login')->nullable();
            $table->timestamp('imported_at')->nullable();
            $table->string('password');
            $table->integer('import_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        \App\Models\User::create([
            'name'              => 'abedelrahman abu amna',
            'email'             => 'abedmq2@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password'          => '123123123',
            'go_auth'           => 'nNQ7AZBaklXtyjvr50EZDcM7JCyNSg',
        ]);
        \App\Models\User::create([
            'name'              => 'abedelrahman abu amna',
            'email'             => 'abedmq@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password'          => '123123123'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
