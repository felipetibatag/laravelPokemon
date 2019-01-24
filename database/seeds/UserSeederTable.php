<?php

use Illuminate\Database\Seeder;
use LaravelPrueba\Role;
use LaravelPrueba\User;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleUser = Role::where('name', 'user')->first();

        $usuario = new User();
        $usuario->name = "user";
        $usuario->email = "user@mail.com";
        $usuario->password = bcrypt('prueba123');
        $usuario->save();
        $usuario->roles()->attach($roleAdmin);

        $usuario = new User();
        $usuario->name = "admin";
        $usuario->email = "admin@mail.com";
        $usuario->password = bcrypt('prueba123');
        $usuario->save();
        $usuario->roles()->attach($roleUser);
    }
}
