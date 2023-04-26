<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'name' => [''],
            // 'email' => ['required','email'],
            'email' => [''],
            'address' => [''],
            'dob' => [''],
        ]);

        $data = Student::create([
            'name' => $validate_data['name'],
            'email' => $validate_data['email'],
            'address' => $validate_data['address'],
            'dob' => $validate_data['dob'],
        ]);

        return response()->json(['data'=>$data]);
    }

    public function getStudent()
    {
        $data = Student::get();
        return response()->json(['data'=>$data]);
    }
}