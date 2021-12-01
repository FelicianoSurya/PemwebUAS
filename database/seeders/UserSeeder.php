<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'image' => 'user.jpg'
            ],
            [
                'name' => 'John',
                'email' => 'john@user.com',
                'password' => bcrypt('john'),
                'role' => 'user',
                'image' => 'user.jpg',
            ],
            [
                'name' => 'Kevin',
                'email' => 'kevin@user.com',
                'password' => bcrypt('kevin'),
                'role' => 'user',
                'image' => 'laki.jpg',
            ],
            [
                'name' => 'Nina',
                'email' => 'nina@user.com',
                'password' => bcrypt('nina'),
                'role' => 'user',
                'image' => 'perempuan.jpg'
            ],
            [
                'name' => 'Fernando',
                'email' => 'nando@management.com',
                'password' => bcrypt('nando'),
                'role' => 'management',
                'image' => 'laki.jpg'
            ]
        ];

        foreach($user as $key=> $value){
            User::create($value);
        }
    }
}
