<?php

use Illuminate\Database\Seeder;

class CabangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cabang')->insert([
          array('name' => 'Fatmawati'),
          array('name' => 'Ambon'),
      ]);
    }
}
