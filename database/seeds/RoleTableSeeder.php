<?php

use Illuminate\Database\Seeder;
use FlorDeLiz\Models\Role;
use Faker\Factory;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake = new Factory();

        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Acesso total ao sistema';
        $role->save();

        $role = new Role();
        $role->name = 'delivery';
        $role->description = 'Acesso somente a funcionalidades de entregas';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'Acesso somente algumas funcionalidades de cadastro e relatórios';
        $role->save();

        $role = new Role();
        $role->name = 'client';
        $role->description = 'Acesso somente ao seu pedido e perfil';
        $role->save();

    }
}
