<?php

use Illuminate\Database\Seeder;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('jenis')->insert([
          array('name' => 'Komputer'),
          array('name' => 'Furniture'),
          array('name' => 'ATK')
      ]);
    }
}
