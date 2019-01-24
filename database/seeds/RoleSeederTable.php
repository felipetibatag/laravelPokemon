<?php

use Illuminate\Database\Seeder;
use LaravelPrueba\Role;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->name = "admin";
        $role->description = "Role de administrador";
        $role->save();

        $role = new Role();
        $role->name = "user";
        $role->description = "Rol de usario";
        $role->save();
    }
}
