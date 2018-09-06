<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('news_topic', function (Blueprint $table) {
            $table->unsignedInteger('news_id');
            $table->unsignedInteger('topic_id');
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
        Schema::dropIfExists('news_topic', function (Blueprint $table){
            $table->dropForeign(['news_status_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
