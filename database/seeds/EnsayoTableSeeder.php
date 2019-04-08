<?php

use Illuminate\Database\Seeder;
use App\Muestra;
use App\Ensayo;

class EnsayoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $muestra1 = Muestra::where('nombre', 'Productos Químico')->first();
        // $muestra2 = Muestra::where('nombre', 'Espumíjenos')->first();
        // $muestra3 = Muestra::where('nombre', 'Combustible')->first();
        $muestra1 = 1;
        $muestra2 = 2;
        $muestra3 = 3;

        $ensayo = new Ensayo();
        $ensayo->nombre = 'Apecto (Turbidez)';
        $ensayo->descripcion = 'Tipo de ensayo Apecto (Turbidez)';
        $ensayo->muestra_id = $muestra1;
        $ensayo->save();

        $ensayo = new Ensayo();
        $ensayo->nombre = 'Color';
        $ensayo->descripcion = 'Tipo de ensayo Color';
        $ensayo->muestra_id = $muestra1;
        $ensayo->save();

        $ensayo = new Ensayo();
        $ensayo->nombre = 'PH';
        $ensayo->descripcion = 'Tipo de ensayo PH';
        $ensayo->muestra_id = $muestra1;
        $ensayo->save();

        $ensayo = new Ensayo();
        $ensayo->nombre = 'Densidad';
        $ensayo->descripcion = 'Tipo de ensayo Densidad';
        $ensayo->muestra_id = $muestra2;
        $ensayo->save();

        $ensayo = new Ensayo();
        $ensayo->nombre = 'Punto de Escurrimiento';
        $ensayo->descripcion = 'Tipo de ensayo Punto de Escurrimiento';
        $ensayo->muestra_id = $muestra2;
        $ensayo->save();

        $ensayo = new Ensayo();
        $ensayo->nombre = 'PH';
        $ensayo->descripcion = 'Tipo de ensayo PH';
        $ensayo->muestra_id = $muestra2;
        $ensayo->save();

        $ensayo = new Ensayo();
        $ensayo->nombre = 'Curva de Destilación';
        $ensayo->descripcion = 'Tipo de ensayo Curva de Destilación';
        $ensayo->muestra_id = $muestra3;
        $ensayo->save();

        $ensayo = new Ensayo();
        $ensayo->nombre = 'Punto de Inflamación';
        $ensayo->descripcion = 'Tipo de ensayo Punto de Inflamación';
        $ensayo->muestra_id = $muestra3;
        $ensayo->save();

    }
}
