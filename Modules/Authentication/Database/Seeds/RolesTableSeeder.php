<?php

namespace Modules\User\Database;

use Illuminate\Database\Seeder;
use Modules\Authentication\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = array(
            array(
                "id" => 1,
                "name" => "Administrador",
            ),
            array(
                "id" => 2,
                "name" => "Atendente",
            ),
            array(
                "id" => 3,
                "name" => "Garçon",
            ),
            array(
                "id" => 4,
                "name" => "Entregador",
            ),
        );


        foreach ($roles as $item) {

            Role::create($item);

        }
    }
}
