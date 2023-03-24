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

    public function searchSubject(Request $request){

        $year = $request->years;
        $semester = $request->semester;
        $subject = $request->subject;

        $row_count = subject::count();

       $subject_data = subject::get();

       for($i = 0;  $i <=  $row_count ; $i++) {


           for($j = 0;  $j <=4; $j++) {
               if($subject_data[$j]->year == $year){
                    echo $subject_data[$j]->year;
               }
            }


       }
    }
}
