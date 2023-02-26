<?php

namespace App\Http\Controllers;
use App\Models\Software;

use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function store(Request $request){

        
        $validate_data=$request->validate([
            'registrations_id'=>[''],
            'Lecture_regs_id'=>[''],
            'software1'=>[''],
            'software2'=>[''],
            'software3'=>[''],
            'software4'=>[''],
            'rating'=>['required'],

        
        ]);
        
        $data=Software::create([
            'registrations_id'=>$validate_data['registrations_id'],
            'Lecture_regs_id'=>$validate_data['Lecture_regs_id'],
            'software1'=>$validate_data['software1'],
            'software2'=>$validate_data['software2'],
            'software3'=>$validate_data['software3'],
            'software4'=>$validate_data['software4'],
            'rating'=>$validate_data['rating'],
        ]);
        
        return response()->json(['data'=>$data]);
    }
}
