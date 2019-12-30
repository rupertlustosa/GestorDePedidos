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
            array(
                "id" => 5,
                "name" => "Sucos (500 ml)",
            ),
            array(
                "id" => 6,
                "name" => "Cerveja (600 ml)",
            ),
            array(
                "id" => 7,
                "name" => "Refrigerantes",
            ),
        );


        foreach ($categories as $item) {

            Category::create($item);

        }
    }
}
