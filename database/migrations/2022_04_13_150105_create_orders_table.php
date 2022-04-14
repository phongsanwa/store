<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->integer('payment_id')->unsigned()->nullable()->default(null);
            $table->string('order_status')->nullable()->default('Đang xử lý đơn hàng');
            $table->string('shipping_address')->nullable();
            $table->string('phoneReceiver')->nullable();
            $table->string('nameReceiver')->nullable();
            $table->integer('shipping_fee')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
