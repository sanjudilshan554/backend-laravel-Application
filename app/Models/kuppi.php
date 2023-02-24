<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kuppi extends Model
{
    use HasFactory;

    protected $fillable=[
            'kuppiname',
            'subject',
            'freetime',
            'place',
            'seniorName',
            'senioremail',
             'seniourregid',
            'on/off',
    ];
}
