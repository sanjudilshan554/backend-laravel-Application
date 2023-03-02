<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;

    protected $fillable=[
        'registrations_id',
        'lecture_regs_id',
        'year',
        'semester',
        'subject',
        'rating',
    ];

    protected $casts = [
        'year' => 'array',
        'semester' => 'array',
        'subject' => 'array',
        'rating' => 'array',
    ];
}
