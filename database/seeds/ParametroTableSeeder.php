<?php

use Illuminate\Database\Seeder;
use App\Parametro;

class ParametroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $parametro = new Parametro();
        $parametro->nombre = 'Nro de Protocolo';
        $parametro->valor = '1456';
        $parametro->prefijo = '0000-';
        $parametro->sufijo = '/CR';
        $parametro->descripcion = 'Nro de protocolo inicial';
        $parametro->save();

        $parametro = new Parametro();
        $parametro->nombre = 'Nro de Pedido Interno';
        $parametro->valor = '2300';
        $parametro->prefijo = '0000-';
        $parametro->sufijo = '';
        $parametro->descripcion = 'Nro de protocolo inicial';
        $parametro->save();
    }
}
