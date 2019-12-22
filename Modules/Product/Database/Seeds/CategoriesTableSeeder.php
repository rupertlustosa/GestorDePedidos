<?php

namespace Modules\User\Database;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = array(
            array(
                "id" => 1,
                "name" => "Pizza do Zé",
            ),
            array(
                "id" => 2,
                "name" => "Pizzas Promocionais",
            ),
            array(
                "id" => 3,
                "name" => "Pizzas Especiais",
            ),
            array(
                "id" => 4,
                "name" => "Bebidas",
            ),
        );

        foreach ($categories as $item) {

            Category::create($item);

        }
    }
}
