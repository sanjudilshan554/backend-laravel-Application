<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revision extends Model
{
    use HasFactory;

    protected $fillable=[
        'revName',
        'registrations_id',
        'subject',
        'freetime',
        'lecHallName',
        'lectureName',
        'lecturemail',
        'lectureempID',
        'members',

    ];
}