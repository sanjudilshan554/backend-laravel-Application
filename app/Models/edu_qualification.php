<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\edu_qualification;

class edu_qualification extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'registrations_id',
        'lecture_regs_id',
        'name',
        'datefrom',
        'dateto',
        'description',
    ];

    protected $casts = [
        'name' => 'array',
        'datefrom'=>'array',
        'dateto'=>'array',
        'description' => 'array',
        
    ];

    public function edu_qualification()  
    {  
      return $this->belongsTo(edu_qualification::class);  
    }
}
