<?php

use Illuminate\Database\Seeder;
use App\Sector;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sector = new Sector();
        $sector->nombre = 'Petróleo';
        $sector->descripcion = 'Sector de ensayos de Petróleo';
        $sector->save();

        $sector = new Sector();
        $sector->nombre = 'Medio Ambiente';
        $sector->descripcion = 'Sector de ensayos de Medio Ambiente';
        $sector->save();

        $sector = new Sector();
        $sector->nombre = 'Química';
        $sector->descripcion = 'Sector de ensayos Químicos';
        $sector->save();  
    }
}
