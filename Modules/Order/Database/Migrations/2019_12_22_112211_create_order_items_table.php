<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('restrict');

            $table->integer('order_status_id')->unsigned();
            $table->foreign('order_status_id')
                ->references('id')
                ->on('order_statuses')
                ->onDelete('restrict');

            $table->bigInteger('product_variation_id')->unsigned();
            $table->foreign('product_variation_id')
                ->references('id')
                ->on('product_variations')
                ->onDelete('restrict');

            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')
                ->references('id')
                ->on('order_items')
                ->onDelete('restrict');

            $table->float('quantity')->default(1);
            $table->float('original_price', 8, 2);
            $table->float('price', 8, 2)->nullable();
            $table->float('total', 8, 2)->nullable()->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
