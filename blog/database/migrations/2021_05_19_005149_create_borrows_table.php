<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ledger_id')->unsigned()->index();
            $table->bigInteger('member_id')->unsigned()->index();
            $table->date('borrow_date');

            //外部キー設定
            $table->foreign('ledger_id')->references('id')->on('ledgers')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');

            //ユニーク設定
            $table->unique(['ledger_id', 'member_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
