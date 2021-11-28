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
            ],
            [
                'name' => 'John',
                'username' => 'john',
                'password' => bcrypt('john'),
                'role' => 'user'
            ]
        ];

        foreach($user as $key=> $value){
            User::create($value);
        }
    }
}
