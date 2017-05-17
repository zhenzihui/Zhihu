<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string("email_token");
            $table->string('email')->unique();
            $table->string('password');
            $table->string("avatar");
            $table->smallInteger('isActive')->default(0);
            $table->integer("question_count")->default(0);
            $table->integer("answer_count")->default(0);
            $table->integer("favorites_count")->default(0);
            $table->integer("like_count")->default(0);
                $table->integer("follower_count")->default(0);
            $table->integer("following_count")->default(0);
            $table->text("settings")->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
