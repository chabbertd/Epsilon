<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Backup;
use App\ConfigBKP;

class BKP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realizar copia de resguardo de la Base de Datos.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        // $log = DB::table('logs')->delete();
        $fecha = date("Y-m-d");
        $nombrearchivo = 'backup_'.$fecha.'_'.time().'.bkp';

        $config = ConfigBKP::all()->take(1);

        $backup = new Backup();
        $backup->frecuencia = $config[0]->frecuencia;
        $backup->ubicacion = $config[0]->ubicacion;
        $backup->observaciones = $config[0]->observaciones;
        $backup->save();
    


        
    }
}
