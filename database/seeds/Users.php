<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UsersCustomSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            array('name' => 'administrator', 'email' => 'admin@admin.com', 'role' => 'admin', 'password' => Hash::make('admin'))
        ]);
        DB::table('cabang')->insert([
            array('name' => 'Fatmawati'),
            array('name' => 'Ambon'),
        ]);
        DB::table('jenis')->insert([
            array('name' => 'Komputer'),
            array('name' => 'Furniture'),
            array('name' => 'ATK')
        ]);
        DB::table('status')->insert([
            array('name' => 'Aktif'),
            array('name' => 'Inaktif'),
            array('name' => 'Dijual'),
            array('name' => 'Rusak')
        ]);
    }
}
