<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCartNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_notification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cartid')->unsigned();
            $table->foreign('cartid')->references('id')->on('card');
            $table->bigInteger('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('user');
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
        Schema::dropIfExists('card_notification');
    }
}
