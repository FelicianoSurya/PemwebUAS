<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilities extends Model
{
    use HasFactory;

    protected $table = 'fasilities';
    protected $fillable = [
        'fasilityID',
        'fasilityName',
        'openTime',
        'closeTime',
        'description',
        'image'
    ];
}
