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
        $data=[
        [
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ],
        [
            'name' => 'Moderator User',
            'email' => 'moderator@gmail.com',
            'role' => 'moderator',
            'password' => bcrypt('12345678'),
        ],
        [
            'name' => 'General User',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => bcrypt('12345678'),
        ]
        ];
        DB::table('users')->insert($data);
    }
}
