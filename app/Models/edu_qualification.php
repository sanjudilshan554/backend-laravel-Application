<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edu_qualification extends Model
{
    use HasFactory;

    protected $fillable=[
        'registrations_id',
        'lecture_regs_id',
        'name',
        'description',
    ];
}