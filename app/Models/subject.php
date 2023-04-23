<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subject;

class subject extends Model
{
    use HasFactory;

    protected $fillable=[
       
        'registrations_id',
        'year',
        'lecture_regs_ids',
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

    public function subject()  
    {  
      return $this->belongsTo(subject::class);  
    }
}