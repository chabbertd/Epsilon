<?php

use Illuminate\Database\Seeder;
use App\Sector;
use App\Muestra;


class MuestraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sector1 = Sector::where('nombre', 'Petróleo')->first();

        $muestra = new Muestra();
        $muestra->nombre = 'Productos Químicos';
        $muestra->descripcion = 'Tipo de muestra Productos Químicos';
        $muestra->sector_id = $sector1->id;
        $muestra->save();

        $muestra = new Muestra();
        $muestra->nombre = 'Espumíjenos';
        $muestra->descripcion = 'Tipo de muestra Espumíjenos';
        $muestra->sector_id = $sector1->id;
        $muestra->save();

        $muestra = new Muestra();
        $muestra->nombre = 'Combustible';
        $muestra->descripcion = 'Tipo de muestra Combustible';
        $muestra->sector_id = $sector1->id;
        $muestra->save();

        $muestra = new Muestra();
        $muestra->nombre = 'Aceites';
        $muestra->descripcion = 'Tipo de muestra Aceites';
        $muestra->sector_id = $sector1->id;
        $muestra->save();


    }
}
