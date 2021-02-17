<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Schema::create('forums', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('content');
        //     $table->timestamps();
        // });

        Schema::create('forums', function (Blueprint $table) {            
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('user_name');
            $table->integer('category_id')->unsigned()->index();
            $table->string('title');
            $table->longText('content');
            $table->string('file_path')->nullable();
            $table->integer('views')->default(0);
            // $table->integer('comment_count');
            // $table->boolean('liked')->nullable();
            $table->timestamps();
        });
        
        //foreign key
        Schema::table('forums', function($table) {
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
        Schema::dropIfExists('forums');
    }
}
