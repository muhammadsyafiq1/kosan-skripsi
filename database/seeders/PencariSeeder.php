<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class PencariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pencari',
            'roles' => 'pencari',
            'email' => 'pencari@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
