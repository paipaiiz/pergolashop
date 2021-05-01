<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ผู้สั่งสินค้า');
            $table->string('code')->nullable()->comment('รหัสรายการสินค้า');
            $table->decimal('total_price', 19, 2)->nullable()->comment('รวมราคาใบสั่ง');
            $table->string('date')->nullable()->comment('วันที่');
            $table->enum('status', ['รอการยืนยัน', 'ยืนยัน', 'ยกเลิก'])->default('รอการยืนยัน')->comment('สถานะ');
            $table->integer('product_count')->comment('จำนวนสินค้าที่สั่งซื้อ');
            $table->boolean('paid')->default(false)->comment('การชำระเงิน');
            $table->enum('payment_type', ['พร้อมเพย์', 'โอนผ่านธนาคาร', 'ชำระปลายทาง'])->comment('สถานะ');
            $table->string('shipping_fullname')->comment('ชื่อนามสกุลผู้ซื้อ');
            $table->string('shipping_house_number')->comment('บ้านเลขที่');
            $table->string('shipping_district')->comment('ตำบล');
            $table->string('shipping_amphore')->comment('อำเภอ');
            $table->string('shipping_province')->comment('จังหวัด');
            $table->string('shipping_postal_code')->comment('รหัสไปรษณีย์');
            $table->string('shipping_tel')->comment('เบอร์ติดต่อ');
            $table->string('shipping_note')->nullable()->comment('อื่นๆ');
            $table->string('slip_payment')->nullable()->comment('สลิปเงินโอน');
            $table->string('supply_number', 13)->nullable()->comment('รหัสพัสดุ');
            $table->string('order_note')->nullable()->comment('หมายเหตุ');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
}
