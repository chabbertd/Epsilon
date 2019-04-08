<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SectorTableSeeder::class);
        $this->call(MuestraTableSeeder::class);
        $this->call(EnsayoTableSeeder::class);
        $this->call(ParametroTableSeeder::class);
        $this->call(BackupTableSeeder::class);
        $this->call(ConfigbkpTableSeeder::class);
        $this->call(ClienteTableSeeder::class);

    }
}
