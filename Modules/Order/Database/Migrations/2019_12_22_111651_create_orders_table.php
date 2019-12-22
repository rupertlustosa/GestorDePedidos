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
            $table->bigIncrements('id');
            $table->bigInteger('attendant_id')->unsigned();
            $table->foreign('attendant_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->bigInteger('deliveryman_id')->unsigned()->nullable();
            $table->foreign('deliveryman_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->integer('order_type_id')->unsigned();
            $table->foreign('order_type_id')
                ->references('id')
                ->on('order_types')
                ->onDelete('restrict');

            $table->integer('order_status_id')->unsigned();
            $table->foreign('order_status_id')
                ->references('id')
                ->on('order_statuses')
                ->onDelete('restrict');

            $table->integer('order_point_id')->unsigned()->nullable();
            $table->foreign('order_point_id')
                ->references('id')
                ->on('order_points')
                ->onDelete('restrict');

            $table->mediumText('notes')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('output_to_delivery_date')->nullable();
            $table->dateTime('end_date')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
