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
            [
            'name' => 'Han',
            'email' => 'nguyenhang@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => 'nghia phong',
            'birthday' => date("Y-m-d H:i:s"),
            'avatar' => Str::random(10),
            'is_active'=>1,
            'role_id' => 0
        ],
        [
            'name' => 'hang',
            'email' => 'hang@gmail.com',
            'password' => Hash::make('135417sn'),
            'address' => 'nam dinh',
            'birthday' => date("Y-m-d H:i:s"),
            'avatar' => Str::random(10),
            'is_active'=>0,
            'role_id' => 1
    ]
        ]);
    }
}
