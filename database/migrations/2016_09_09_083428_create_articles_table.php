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
            $table->string('title',100)->nullable()->comment('标题');
            $table->text('description')->nullable()->comment('内容');
            $table->string('image_url',100)->nullable()->comment('图片地址');
            $table->unsignedInteger('hit')->default(0)->nullable()->comment('点击量');
            $table->string('author',100)->nullable()->comment('自定义作者');
            $table->integer('users_id')->default(0)->nullable()->comment('作者ID');
            $table->integer('columns_id')->default(0)->nullable()->comment('栏目ID');
            $table->dateTime('create_time')->nullable()->comment('创建时间');
            $table->timestamps();
            $table->softDeletes();
            $table->engine  = 'MyISAM';
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
