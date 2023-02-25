<?php

namespace App\Http\Controllers;
use App\Models\Software;

use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function store(Request $request){

        
        $validate_data=$request->validate([
            'registrations_id'=>['required'],
            'Lecture_regs_id'=>[''],
            'name'=>['required'],
            'rating'=>['required'],
        ]);
        
        $data=Software::create([
            'registrations_id'=>$validate_data['registrations_id'],
            'Lecture_regs_id'=>$validate_data['Lecture_regs_id'],
            'name'=>$validate_data['name'],
            'rating'=>$validate_data['rating'],
        ]);
        
        return response()->json(['data'=>$data]);
    }
}
