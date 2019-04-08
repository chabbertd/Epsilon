<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cliente = new Cliente();
        $cliente->tipocliente = '0';
        $cliente->apellidoynombre = 'Diego Chabbert';
        $cliente->email = 'diego.chabbert@mail.com';
        $cliente->direccion = '----';
        $cliente->localidad = 'Comodoro Rivadavia';
        $cliente->codigopostal = '9000';
        $cliente->telefono = '----';
        $cliente->cuit = '20248615266';
        $cliente->condicioniva = 'Responsable Monotributo'; 
        $cliente->observaciones = '----';
        $cliente->save();

        $cliente = new Cliente();
        $cliente->tipocliente = '1';
        $cliente->razonsocial = 'Empresa ABC';
        $cliente->email = 'empresaABC@mail.com';
        $cliente->cuit = '30708090149';
        $cliente->condicioniva = 'Responsable Inscripto';        
        $cliente->observaciones = '----';
        $cliente->save();

      
    }
}
