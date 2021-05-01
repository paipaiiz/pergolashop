<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ผู้สั่งสินค้า');
            $table->string('fullname')->comment('ชื่อ-นามสกุล');
            $table->string('house_number')->comment('บ้านเลขที่');
            $table->string('district')->comment('ตำบล');
            $table->string('amphore')->comment('อำเภอ');
            $table->string('province')->comment('จังหวัด');
            $table->string('postal_code')->comment('รหัสไปรษณีย์');
            $table->string('tel')->comment('เบอร์ติดต่อ');
            $table->string('product_name')->comment('ชื่อสินค้า');
            $table->string('code')->comment('รหัสรายการสินค้า');
            $table->string('note')->comment('หมายเหตุ');
            $table->integer('amount')->comment('จำนวน');
            $table->string('image', 255)->comment('รูปสินค้า');
            $table->enum('status', ['รอการยืนยัน', 'ยืนยัน', 'ยกเลิก'])->default('รอการยืนยัน')->comment('สถานะ');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('return_products');
    }
}
