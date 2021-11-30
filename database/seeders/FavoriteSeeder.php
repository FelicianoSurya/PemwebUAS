<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favorite = [
            [
                'fasilityID' => 3,
                'userID' => 3
            ],
            [
                'fasilityID' => 4,
                'userID' => 3
            ],
            [
                'fasilityID' => 6,
                'userID' => 3
            ],
            [
                'fasilityID' => 3,
                'userID' => 4
            ],
            [
                'fasilityID' => 2,
                'userID' => 4
            ],
        ];

        foreach($favorite as $key => $value){
            Favorite::create($value);
        }
    }
}
