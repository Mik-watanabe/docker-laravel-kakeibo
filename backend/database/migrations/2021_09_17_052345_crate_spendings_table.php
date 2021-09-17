<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateSpendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->unsignedInteger('category_id')->comment('カテゴリID');
            $table->string('name')->comment('支出名');
            $table->unsignedInteger('amount')->comment('支出額');
            $table->date('accrual_date')->comment('支出した日付');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spendings');
    }
}
