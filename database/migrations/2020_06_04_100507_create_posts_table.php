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
            $table->string('title')->uniqid();
            $table->string('slug');
            $table->integer('category_id')->unsigned();
            $table->string('image');
            $table->string('video')->nullable();
            $table->text('content');
            $table->integer('author')->unsigned();
            $table->integer('editor')->nullable()->unsigned();
            $table->boolean('status');
            $table->integer('view');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->foreign('author')->references('id')->on('users');
            $table->foreign('editor')->references('id')->on('users');
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
