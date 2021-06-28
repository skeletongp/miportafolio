<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('slug',135);
            $table->unsignedBigInteger('user_id');
            $table->text('description',1080);
            $table->string('image',150);
            $table->tinyInteger('is_active');
            $table->unsignedBigInteger('topic_id');
            $table->foreign('topic_id')
            ->references('id')
            ->on('topics');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
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
        Schema::dropIfExists('posts');
    }
}
