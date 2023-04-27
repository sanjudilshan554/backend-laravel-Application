<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Software;

class Software extends Model
{
    use HasFactory;

    // protected $table = "dfdfdf";

    protected $fillable=[
        'id',
        'registrations_id',
        'Lecture_regs_id',
        'software1',
        'software2',
        'software3',
        'software4',
        'rating',
    ];

    protected $casts = [
        'rating' => 'array'
    ];

    
 public function software()  
 {  
   return $this->belongsTo(Software::class);  
 }
}