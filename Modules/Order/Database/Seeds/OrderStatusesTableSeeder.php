<?php

namespace Modules\User\Database;

use Illuminate\Database\Seeder;
use Modules\Order\Models\OrderStatus;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $order_statuses = array(
            array(
                "id" => 1,
                "name" => "Novo",
            ),
            array(
                "id" => 2,
                "name" => "Preparação",
            ),
            array(
                "id" => 3,
                "name" => "Disponível para o cliente",
            ),
            array(
                "id" => 4,
                "name" => "Saiu para entrega",
            ),
            array(
                "id" => 5,
                "name" => "Entregue",
            ),
        );


        foreach ($order_statuses as $item) {

            OrderStatus::create($item);

        }
    }
}
