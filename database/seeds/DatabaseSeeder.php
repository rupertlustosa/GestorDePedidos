<?php

use Illuminate\Database\Seeder;
use Modules\User\Database\CategoriesTableSeeder;
use Modules\User\Database\OrderPointsTableSeeder;
use Modules\User\Database\OrderStatusesTableSeeder;
use Modules\User\Database\OrderTypesTableSeeder;
use Modules\User\Database\ProductsTableSeeder;
use Modules\User\Database\RolesTableSeeder;
use Modules\User\Database\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(OrderPointsTableSeeder::class);
        $this->call(OrderTypesTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
