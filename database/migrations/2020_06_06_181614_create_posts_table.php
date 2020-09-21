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
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image')->nullable();
            $table->text('content');
            $table->foreignId('author')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('editor')->nullable()->constrained('users')->cascadeOnUpdate();
            $table->boolean('is_published')->unsigned()->default(0);
            $table->boolean('is_rejected')->unsigned()->default(0);
            $table->integer('view')->unsigned();
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
