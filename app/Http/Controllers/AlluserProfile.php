<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\subject;
use App\Models\work_exp;
use App\Models\edu_qualification;
use App\Models\LectureReg;
use App\Models\Registration;



class AlluserProfile extends Controller
{
    public function getProfileData(Request $request)
    {
        
        //variable name=modelname::with('model name')->where('primary key or somthing',$request->id)->get();
       

        // return $software_data;
        // return $subject_data;
        // return $work_data;
        // return $edu_qualify_data;
        // return $Lect_reg;
        // return $customer_reg;
        
        if($request->role=="student"){
            $software_data = Software::with('software')->where('registrations_id',$request->id)->get();
            $subject_data = subject::with('subject')->where('registrations_id',$request->id)->get();
            $work_data=work_exp::with('work_exp')->where('registrations_id',$request->id)->get();
            $edu_qualify_data=edu_qualification::with('edu_qualification')->where('registrations_id',$request->id)->get();
            $Lect_reg=LectureReg::with('LectureReg')->where('id',$request->id)->get();
            $customer_reg=Registration::with('Registration')->where('id',$request->id)->get();
            return response()->json(['software_data'=>$software_data,'subject_data'=>$subject_data,'work_data'=>$work_data,'edu_qualify_data'=>$edu_qualify_data,'Lect_reg'=>$Lect_reg,'customer_reg'=>$customer_reg]);
        }
        else if($request->role=="lecture"){
            $software_data= Software::with('software')->where('Lecture_regs_id',$request->id)->get();
            $subject_data = subject::with('subject')->where('lecture_regs_id',$request->id)->get();
            $work_data=work_exp::with('work_exp')->where('lecture_regs_id',$request->id)->get();
            $edu_qualify_data=edu_qualification::with('edu_qualification')->where('lecture_regs_id',$request->id)->get();
            $Lect_reg=LectureReg::with('LectureReg')->where('id',$request->id)->get();
            $customer_reg=Registration::with('Registration')->where('id',$request->id)->get();
            return response()->json(['software_data'=>$software_data,'subject_data'=>$subject_data,'work_data'=>$work_data,'edu_qualify_data'=>$edu_qualify_data,'Lect_reg'=>$Lect_reg,'customer_reg'=>$customer_reg]);
        } else {
            return response()->json(['status'=>'500','message'=>'No data']);
        }
    
    }
}
