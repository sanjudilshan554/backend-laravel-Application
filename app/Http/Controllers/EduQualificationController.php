<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\edu_qualification;

class EduQualificationController extends Controller
{
    public function store(Request $request){

        

        $validate_data=$request->validate([
        'registrations_id'=>[''],
        'lecture_regs_id'=>[''],
        'name'=>['required'],
        'description'=>['required'],
        ]);


        $data=edu_qualification::create([
        'registrations_id'=>$validate_data['registrations_id'],
        'lecture_regs_id'=>$validate_data['lecture_regs_id'],
        'name'=>$validate_data['name'],
        'description'=>$validate_data['description'],
        ]);

        return response()->json(['data'=>$data,'status'=>'200']);
      
    }

}
