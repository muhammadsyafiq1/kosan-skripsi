<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pemilik',
            'roles' => 'pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
