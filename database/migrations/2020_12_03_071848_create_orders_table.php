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
            $table->foreignId('customer_id');
            $table->string('order_no');
            $table->string('order_date');
            $table->string('total_product');
            $table->string('sub_total');
            $table->string('tax');
            $table->string('total');
            $table->string('payment_type');
            $table->string('pay');
            $table->string('due')->nullable();
            $table->string('status')->default('Success');
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
        Schema::dropIfExists('orders');
    }
}
