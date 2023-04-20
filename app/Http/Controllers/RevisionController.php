<?php

namespace App\Http\Controllers;
use App\Models\revision;

use Illuminate\Http\Request;

class RevisionController extends Controller
{
    public function store(Request $request){
     

        $validate_data=$request ->validate([
            'revName'=>['required'],
            'localID'=>['required'],
            'subject'=>['required'],
            'freetime'=>['required'],
            'lecHallName'=>['required'],
            'lectureName'=>['required'],
            'lecturemail'=>['required','email'],
            'lectureempID'=>['required'],
            'members'=>['required'],
        ]);

        $data=revision::create([
            'revName'=>$validate_data['revName'],
            'registrations_id'=>$validate_data['localID'],
            'subject'=>$validate_data['subject'],
            'freetime'=>$validate_data['freetime'],
            'lecHallName'=>$validate_data['lecHallName'],
            'lectureName'=>$validate_data['lectureName'],
            'lecturemail'=>$validate_data['lecturemail'],
            'lectureempID'=>$validate_data['lectureempID'],
            'members'=>$validate_data['members'],
        ]);
        
        return response()->json(['data'=>$data,'status'=>'200','message'=>'Request send successfully']);
    }
}