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
        
        $role = new Role();
        $role->nombre = "Administrador de clientes particulares";
        $role->descripcion = "Administrador de Clientes Particulares";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador de empresas";
        $role->descripcion = "Administrador de Empresas";
        $role->save();

        $role = new Role();
        $role->nombre = "Visualizador Registro de Logs";
        $role->descripcion = "Visualizador Registro de Logs";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador paramétrico - Sectores";
        $role->descripcion = "Administrador paramétrico - Sectores";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador paramétrico - Muestras";
        $role->descripcion = "Administrador paramétrico - Muestras";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador paramétrico - Ensayos";
        $role->descripcion = "Administrador paramétrico - Ensayos";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador paramétros de arranque";
        $role->descripcion = "Administrador paramétros de arranque";
        $role->save();

        $role = new Role();
        $role->nombre = "Administrador backup";
        $role->descripcion = "Administrador backup";
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
