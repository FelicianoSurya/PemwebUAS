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
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'image' => 'user.jpg'
            ],
            [
                'name' => 'John',
                'username' => 'john',
                'password' => bcrypt('john'),
                'role' => 'user',
                'image' => 'user.jpg',
            ],
            [
                'name' => 'Kevin',
                'username' => 'kevin',
                'password' => bcrypt('kevin'),
                'role' => 'user',
                'image' => 'laki.jpg',
            ],
            [
                'name' => 'Nina',
                'username' => 'nina',
                'password' => bcrypt('nina'),
                'role' => 'user',
                'image' => 'perempuan.jpg'
            ],
        ];

        foreach($user as $key=> $value){
            User::create($value);
        }
    }
}
