<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite';
    protected $fillable = ['fasilityID','userID'];

    public function fasility(){
        return $this->belongsTo(Fasilities::class , 'fasilityID' , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userID', 'id');
    }


}
