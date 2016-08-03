<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        $this->call(UserTableSeeder::class);

        $this->call(VehiculoTableSeeder::class);

        $this->call(UserVehiTableSeeder::class);

        Model::reguard();
    }
}