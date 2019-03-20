<?php

use Illuminate\Database\Seeder;
use App\Role;

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
        $role = new Role();
        $role->nombre = "Administrador de clientes";
        $role->descripcion = "Administrador de Clientes";
        $role->save();

        $role = new Role();
        $role->nombre = "Gestor de pedidos";
        $role->descripcion = "Gestor de Pedidos";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador de tablas paramétricas";
        $role->descripcion = "Administrador de tablas paramétricas";
        $role->save();

        $role = new Role();
        $role->nombre = "Gestor de informes";
        $role->descripcion = "Gestor de informes";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador de presupuestos";
        $role->descripcion = "Administrador de presupuestos";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador de usuarios";
        $role->descripcion = "Administrador de usuarios";
        $role->save();
    }
    
}
