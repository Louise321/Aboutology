<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('articles', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->nullable();
        //     $table->string('title');
        //     $table->string('category');
        //     $table->longText('description');
        //     $table->timestamps();
        // });

        Schema::create('articles', function (Blueprint $table) {            
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();

            $table->string('title');
            $table->longText('description');
            $table->string('file_path')->nullable();
            $table->integer('views')->default(0);
            // $table->boolean('liked')->nullable();
            $table->timestamps();
        });
        
        //foreign key
        Schema::table('articles', function($table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('articles');
    }
}
