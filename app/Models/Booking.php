<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Fasilities;

class Booking extends Model
{
    use HasFactory;
    
    protected $table = 'bookings';
    protected $fillable = [
        'fasilityID',
        'bookingDate',
        'startTime',
        'endTime',
        'userID',
        'status',
    ];

    public function fasility(){
        return $this->belongsTo(Fasilities::class, 'fasilityID' , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userID', 'id');
    }
}
