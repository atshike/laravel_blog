<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->nullable();
            $table->text('description')->nullable();
            $table->string('image_url',100)->nullable();
            $table->unsignedInteger('hit')->default(0)->nullable();
            $table->string('author',100)->nullable();
            $table->unsignedInteger('users_id')->default(0)->nullable();
            $table->unsignedInteger('columns_id')->default(0)->nullable();
            $table->time('create_time')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
