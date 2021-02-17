<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->integer('article_id')->unsigned()->index();
            // $table->integer('forum_id')->unsigned()->index();
            $table->boolean('liked');
            // $table->smallInteger('like')->default(0);
            // $table->smallInteger('dislike')->default(0);
            $table->timestamps();
        
            $table->unique(['user_id', 'article_id']);
        });

        Schema::table('likes', function($table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table
                ->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
