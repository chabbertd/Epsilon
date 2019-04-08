<?php

use Illuminate\Database\Seeder;
use App\ConfigBKP;

class ConfigbkpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $backup = new ConfigBKP();
        $backup->frecuencia = 'Semanal';
        $backup->ubicacion = '/home/vagrant/code/epsilon/backups';
        $backup->observaciones = 'Copia de resguardo Semanal';
        $backup->save();
    }
}
