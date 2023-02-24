<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureReg extends Model
{
    use HasFactory;
    //databse name here
    protected $fillable=[
            'fname',
            'lname',
            'age',
            'address',
            'postelCode',
            'city',
            'province',
            'district',
            'country',
            '1styrSub',
            '2ndyrSub',
            '3rdyrSub',
            '4thyrSub',
            'EduQualification',
            'mobNumber',
            'gender',
            'email',
            'empNo',
            'password',
            'role',
        ];
}
