<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 50);
            $table->integer('product_amount');
            $table->double('product_price', 8, 2);
            $table->double('product_old_price', 8, 2)->nullable();
            $table->enum('status', ['sale', 'normal', 'new'])->default('normal')->comment('สถานะ');
            $table->string('product_detail', 500);
            $table->string('product_type', 50);
            $table->string('product_image', 255);
            $table->string('product_ar_id', 255)->nullable();
            $table->string('product_360_link', 255)->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('products');
    }
}
