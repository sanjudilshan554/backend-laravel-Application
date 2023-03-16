<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\work_exp;

class work_exp extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'registrations_id',
        'lecture_regs_id',
        'name',
        'datefrom',
        'dateto',
        'Description',
    ];

    protected $casts = [
        'name' => 'array',
        'datefrom'=>'array',
        'dateto'=>'array',
        'Description' => 'array',
    ];

    public function work_exp()  
    {  
      return $this->belongsTo(work_exp::class);  
    }
}
