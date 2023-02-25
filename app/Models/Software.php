<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $fillable=[
        'registrations_id',
        'Lecture_regs_id',
        'name',
        'rating',
    ];
}
