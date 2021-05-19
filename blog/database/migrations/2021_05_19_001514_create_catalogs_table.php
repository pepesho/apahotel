<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments('ISBN_id');
            $table->string('title');
            $table->bigInteger('genre_id')->unsigned()->index();
            $table->string('author');
            $table->string('publisher');
            $table->date('publisher_date');

            //外部キー設定
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');

            //ユニーク設定
            $table->unique('genre_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
