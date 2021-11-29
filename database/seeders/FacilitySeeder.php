<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilities;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasility = [
            [
                'fasilityID' => 'F01',
                'fasilityName' => 'Meeting Room',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum nemo omnis fuga placeat, officia numquam doloremque aspernatur temporibus impedit voluptatibus cum itaque suscipit incidunt ipsum cumque voluptas. Asperiores, ipsam quibusdam!',
                'image' => 'fasilitas1.jpg',
            ],
            [
                'fasilityID' => 'F02',
                'fasilityName' => 'Gym Room',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum nemo omnis fuga placeat, officia numquam doloremque aspernatur temporibus impedit voluptatibus cum itaque suscipit incidunt ipsum cumque voluptas. Asperiores, ipsam quibusdam!',
                'image' => 'fasilitas2.jpg',
            ],
            [
                'fasilityID' => 'F03',
                'fasilityName' => 'Kamar Queen Bad Khusus Ratu',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum nemo omnis fuga placeat, officia numquam doloremque aspernatur temporibus impedit voluptatibus cum itaque suscipit incidunt ipsum cumque voluptas. Asperiores, ipsam quibusdam!',
                'image' => 'fasilitas3.jpg',
            ],
            [
                'fasilityID' => 'F04',
                'fasilityName' => 'Lunch Room',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum nemo omnis fuga placeat, officia numquam doloremque aspernatur temporibus impedit voluptatibus cum itaque suscipit incidunt ipsum cumque voluptas. Asperiores, ipsam quibusdam!',
                'image' => 'fasilitas4.jpg',
            ],
            [
                'fasilityID' => 'F05',
                'fasilityName' => 'BasketBall Court',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum nemo omnis fuga placeat, officia numquam doloremque aspernatur temporibus impedit voluptatibus cum itaque suscipit incidunt ipsum cumque voluptas. Asperiores, ipsam quibusdam!',
                'image' => 'fasilitas5.jpg',
            ],
            [
                'fasilityID' => 'F06',
                'fasilityName' => 'Swimming Pool',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum nemo omnis fuga placeat, officia numquam doloremque aspernatur temporibus impedit voluptatibus cum itaque suscipit incidunt ipsum cumque voluptas. Asperiores, ipsam quibusdam!',
                'image' => 'fasilitas6.jpg',
            ]
        ];
        
        foreach($fasility as $key=> $value){
            Fasilities::create($value);
        }
    }
}
