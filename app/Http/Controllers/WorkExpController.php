<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\work_exp;

class WorkExpController extends Controller
{
    public function store(Request $request){
        
        $validate_data=$request->validate([
            'registrations_id'=>[''],
            'lecture_regs_id'=>[''],
            'name'=>['required'],
            'Description'=>['required'],
        ]);

        $data=work_exp::create([
            'registrations_id'=> $validate_data['registrations_id'],
            'lecture_regs_id'=> $validate_data['lecture_regs_id'],
            'name'=> $validate_data['name'],
            'Description'=> $validate_data['Description'],
        ]);

        return response()->json(['data'=>$data]);
    }
}
