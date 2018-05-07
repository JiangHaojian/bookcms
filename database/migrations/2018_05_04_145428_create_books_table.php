<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->comment('书籍id');
            $table->string('publisher',50)->comment('出版社');
            $table->string('author',50)->comment('作者');
            $table->string('name',50)->comment('书名');
            $table->timestamp('publish_time')->nullable()->comment('出版日期');
            $table->string('language',50)->comment('语种');
            $table->string('img')->nullable()->comment('图片');
            $table->integer('stock')->comment('库存');
            $table->text('desc')->nullable()->comment('描述');
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
        Schema::dropIfExists('books');
    }
}
