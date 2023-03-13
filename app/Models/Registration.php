<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registration;

class Registration extends Model
{
    use HasFactory;

    protected $fillable=[
            'id',
            'fname',
            'lname',
            'age',
            'workingPlace',
            'school',
            'email',
            'address',
            'postelcode',
            'city',
            'Province',
            'District',
            'country',
            'gender',
            'mobNo',
            'currentDegree',
            'currentYear',
            'SpKnowledge',
            'EdQualification',
            'FamSoftware',
            'SubjectKnow',
            'Certification',
            'unvRegNo',
            'password',
            'role',
    ];

    public function Registration()  
    {  
      return $this->belongsTo(Registration::class);  
    }
}
