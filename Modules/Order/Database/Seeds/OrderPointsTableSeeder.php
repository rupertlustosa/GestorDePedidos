<?php

namespace Modules\User\Database;

use Illuminate\Database\Seeder;
use Modules\Order\Models\OrderPoint;

class OrderPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (range(1, 10) as $item) {

            OrderPoint::create([
                'name' => str_pad($item, 2, '0', STR_PAD_LEFT)
            ]);

        }
    }
}
