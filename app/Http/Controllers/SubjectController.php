<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\subject;

class SubjectController extends Controller
{
    public function store(Request $request){
        $validate_data=$request->validate([
            'registrations_id'=>[''],
            'lecture_regs_id'=>[''],
            'name'=>['required'],
            'rating'=>['required'],
        ]);

        $data=subject::create([
            'registrations_id'=>$validate_data['registrations_id'],
            'lecture_regs_id'=>$validate_data['lecture_regs_id'],
            'name'=>$validate_data['name'],
            'rating'=>$validate_data['rating'],
        ]);
        return response()->json(['data'=>$data]);
    }


}
