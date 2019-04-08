<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\ConfigBKP;
use App\Backup;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
     //  'App\Console\Commands\BKP'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $config = ConfigBKP::all()->take(1);

        // $fecha = date("Y-m-d");
        // $nombrearchivo = $config[0]->ubicacion.'/backup_'.$fecha.'_'.time().'.bkp';

        // $host = 'localhost';
        // $username = config('database.connections.mysql.username');
        // $password = config('database.connections.mysql.password');
        // $database = config('database.connections.mysql.database');        

        // if ($config[0]->frecuencia == '5minutos'){

        //     // $schedule->command('backup:create')->everyFiveMinutes();
        //     // $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        //     //           ->everyFiveMinutes()
        //     //           ->sendOutputTo($nombrearchivo);
        //     }
        // elseif ($config[0]->frecuencia == '1minuto') {
        //     // $schedule->command('backup:create')->everyMinute();
        //     // $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        //     //           ->everyMinute()
        //     //           ->sendOutputTo($nombrearchivo);
        //     }
        // elseif ($config[0]->frecuencia == 'Diaria') {
        //     $schedule->command('backup:create')->daily();
        //     $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        //               ->daily()
        //               ->sendOutputTo($nombrearchivo);
        //     }
        // elseif ($config[0]->frecuencia == 'Semanal') {
        //     $schedule->command('backup:create')->weekly();
        //     $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        //               ->weekly()
        //               ->sendOutputTo($nombrearchivo);
        //     }
        // elseif ($config[0]->frecuencia == 'Quincenal') {
        //     $schedule->command('backup:create')->quarterly();
        //     $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        //               ->quarterly()
        //               ->sendOutputTo($nombrearchivo);
        //     }
        // elseif ($config[0]->frecuencia == 'Mensual') {
        //     $schedule->command('backup:create')->monthly();
        //     $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        //               ->monthly()
        //               ->sendOutputTo($nombrearchivo);
        //     }
        // elseif ($config[0]->frecuencia == 'Anual') {
        //     $schedule->command('backup:create')->yearly();
        //     $schedule->exec("mysqldump -h {$host} -u {$username} -p{$password} {$database}")
        //               ->yearly()
        //               ->sendOutputTo($nombrearchivo);
        //     }
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
