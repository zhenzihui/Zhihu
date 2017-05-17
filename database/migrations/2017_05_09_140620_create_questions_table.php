<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string('title');
            $table->string("body",5000);
            $table->integer("comments_count")->default(0);
            $table->integer("followers_count")->default(1);
            $table->integer("answers_count")->default(0);
            $table->integer("isclosed")->default(0);
            $table->integer("ishidden")->default(0);
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
        Schema::dropIfExists('questions');
    }
}
