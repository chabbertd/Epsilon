<?php

use Illuminate\Database\Seeder;
use App\Backup;


class BackupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $backup = new Backup();
        $backup->frecuencia = 'Semanal';
        $backup->ubicacion = '/home/vagrant/code/epsilon/backups';
        $backup->observaciones = 'Copia de resguardo Semanal';
        $backup->save();

        $backup = new Backup();
        $backup->frecuencia = 'Semanal';
        $backup->ubicacion = '/home/vagrant/code/epsilon/backups';
        $backup->observaciones = 'Copia de resguardo Semanal';
        $backup->save();


    }
}
