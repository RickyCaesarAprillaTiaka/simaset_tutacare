<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CabangTableSeeder::class);
        $this->call(JenisTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}
