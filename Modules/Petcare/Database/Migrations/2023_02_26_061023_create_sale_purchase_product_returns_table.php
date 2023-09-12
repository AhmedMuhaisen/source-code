<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalePurchaseProductReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_purchase_product_returns', function (Blueprint $table) {
            $table->id();
            $table->integer('return_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->double('qty')->nullable();
            $table->integer('purchase_unit_id')->nullable();
            $table->double('net_unit_cost')->nullable();
            $table->double('discount')->nullable();
            $table->double('tax_rate')->nullable();
            $table->double('tax')->nullable();
            $table->double('total')->nullable();
            $table->integer('variant_id')->nullable();
            $table->text('imei_number')->nullable();
            $table->integer('product_batch_id')->nullable();
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
        Schema::dropIfExists('sale_purchase_product_returns');
    }
}
