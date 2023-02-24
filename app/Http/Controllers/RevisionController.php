<?php

namespace App\Http\Controllers;
use App\Models\revision;

use Illuminate\Http\Request;

class RevisionController extends Controller
{
    public function store(Request $request){
       

        $validate_data=$request ->validate([
            'revName'=>['required'],
            'subject'=>['required'],
            'freetime'=>['required'],
            'lecHallName'=>['required'],
            'lectureName'=>['required'],
            'lecturemail'=>['required','email'],
            'lectureempID'=>['required'],
            
        ]);

        $data=revision::create([
            'revName'=>$validate_data['revName'],
            'subject'=>$validate_data['subject'],
            'freetime'=>$validate_data['freetime'],
            'lecHallName'=>$validate_data['lecHallName'],
            'lectureName'=>$validate_data['lectureName'],
            'lecturemail'=>$validate_data['lecturemail'],
            'lectureempID'=>$validate_data['lectureempID'],
        ]);
        
        return response()->json(['data'=>$data,'status'=>'200','message'=>'data save']);
    }
}
