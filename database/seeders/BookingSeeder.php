<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booking = [
            [
                'fasilityID' => 1,
                'bookingDate' => '2021-10-30',
                'startTime' => '10:00:00',
                'endTime' => '12:00:00',
                'userID' => 2,
                'status' => 'waiting'
            ],
            [
                'fasilityID' => 2,
                'bookingDate' => '2021-10-30',
                'startTime' => '10:00:00',
                'endTime' => '12:00:00',
                'userID' => 3,
                'status' => 'waiting'
            ],
            [
                'fasilityID' => 3,
                'bookingDate' => '2021-10-30',
                'startTime' => '10:00:00',
                'endTime' => '12:00:00',
                'userID' => 4,
                'status' => 'approved'
            ],
            [
                'fasilityID' => 4,
                'bookingDate' => '2021-10-29',
                'startTime' => '10:00:00',
                'endTime' => '12:00:00',
                'userID' => 2,
                'status' => 'rejected'
            ],
        ];

        foreach($booking as $key=> $value){
            Booking::create($value);
        }
    }
}
