<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('status')->insert([
          array('name' => 'Aktif'),
          array('name' => 'Inaktif'),
          array('name' => 'Dijual'),
          array('name' => 'Rusak')
      ]);
    }
}
