<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$role_user1 = Role::where('nombre', 'Administrador de usuarios')->first();
    	$role_user2 = Role::where('nombre', 'Gestor de informes')->first();
    	$role_user3 = Role::where('nombre', 'Administrador de clientes')->first();

        $user = new User();
        $user->name = 'Diego Chabbert';
        $user->email = 'diego.chabbert@mail.com';
        $user->direccion = '----';
        $user->localidad = 'Comodoro Rivadavia';
        $user->codigopostal = '9000';
        $user->telefono = '----';
        $user->username = 'chabbertd';
        $user->password = bcrypt('123456');
        $user->save();        
        $user->roles()->attach($role_user1);

        $user = new User();
        $user->name = 'Juan Cortez';
        $user->email = 'juan.cortez@mail.com';
        $user->direccion = '----';
        $user->localidad = 'Comodoro Rivadavia';
        $user->codigopostal = '9000';
        $user->telefono = '----';
        $user->username = 'juan';
        $user->password = bcrypt('123456');
        $user->save();        
        $user->roles()->attach($role_user2);

        $user = new User();
        $user->name = 'Marcelo Ríos';
        $user->email = 'marcelo.rios@mail.com';
        $user->direccion = '----';
        $user->localidad = 'Comodoro Rivadavia';
        $user->codigopostal = '9000';
        $user->telefono = '----';
        $user->username = 'marcelo';
        $user->password = bcrypt('123456');
        $user->save();        
        $user->roles()->attach($role_user3);

        $user = new User();
        $user->name = 'Pedro Alonso';
        $user->email = 'pedro.alonso@mail.com';
        $user->direccion = '----';
        $user->localidad = 'Comodoro Rivadavia';
        $user->codigopostal = '9000';
        $user->telefono = '----';
        $user->username = 'pedro';
        $user->password = bcrypt('123456');
        $user->save();        
        $user->roles()->attach($role_user1);

        $user = new User();
        $user->name = 'Cristian Carrizo';
        $user->email = 'cristian.carrizo@mail.com';
        $user->direccion = '----';
        $user->localidad = 'Comodoro Rivadavia';
        $user->codigopostal = '9000';
        $user->telefono = '----';
        $user->username = 'cristian';
        $user->password = bcrypt('123456');
        $user->save();        
        $user->roles()->attach($role_user2);
  
    }
}
