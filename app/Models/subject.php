<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subject;

class subject extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
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

    public function subject()  
    {  
      return $this->belongsTo(subject::class);  
    }
}
