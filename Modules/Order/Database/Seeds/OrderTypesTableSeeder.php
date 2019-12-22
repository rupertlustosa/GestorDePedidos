<?php

namespace Modules\User\Database;

use Illuminate\Database\Seeder;
use Modules\Order\Models\OrderType;

class OrderTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $order_types = array(
            array(
                "id" => 1,
                "name" => "Balcão comer",
            ),
            array(
                "id" => 2,
                "name" => "Balcão levar",
            ),
            array(
                "id" => 3,
                "name" => "Pedido levar",
            ),
            array(
                "id" => 4,
                "name" => "Pedido buscar",
            ),
        );


        foreach ($order_types as $item) {

            OrderType::create($item);

        }
    }
}
