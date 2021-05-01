<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->comment('เชื่อมใบสั่ง');
            $table->unsignedBigInteger('product_id')->comment('เชื่อมสินค้า');
            $table->decimal('product_price', 19, 2)->nullable()->comment('ราคาต่อชิ้น');
            $table->string('product_name')->comment('ชื่อสินค้า');
            $table->integer('quantity')->comment('จำนวนสินค้า');
            $table->decimal('total_price', 19, 2)->nullable()->comment('รวมเป็นเงิน');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}