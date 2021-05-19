<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ISBN_id')->unsigned()->index();
            $table->string('title');
            $table->date('arrival_day');

            //外部キー設定
            $table->foreign('ISBN_id')->references('id')->on('catalogs')->onDelete('cascade');

            // //ユニーク設定
            // $table->unique('ISBN_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}
