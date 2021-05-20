<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
    }
}
