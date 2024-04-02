<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Malleus',
            'email' => 'Malleus@mail.com',
            'role' => 'Admin',
            'gender' =>'male',
            'DOB'=>Carbon::parse('2000-01-01'),
            'country'=>'Indonesia',
            'password' => bcrypt('user123')
        ]);

        DB::table('users')->insert([
            'name' => 'Lilia',
            'email' => 'Lilia@mail.com',
            'role' => 'Customer',
            'gender' =>'male',
            'DOB'=>Carbon::parse('2000-01-01'),
            'country'=>'Indonesia',
            'password' => bcrypt('user123')
        ]);

    }
}
