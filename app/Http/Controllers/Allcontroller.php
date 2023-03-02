<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\subject;
use App\Models\edu_qualification;
use App\Models\work_exp;

class Allcontroller extends Controller
{
    public function update(Request $request){

 
        

         //Software part -----------------------------------------------------------
        // any name = Front end name
        $software_one =  $request->software['software_one'];
        $software_two =  $request->software['software_two'];
        $software_three =  $request->software['software_three'];
        $software_four =  $request->software['software_four'];

        //Getting data from front end
        $software_one_rate =  $request->software_rate['software_one_rate'];
        $software_two_rate =  $request->software_rate['software_two_rate'];
        $software_three_rate =  $request->software_rate['software_three_rate'];
        $software_four_rate =  $request->software_rate['software_four_rate'];

        //initialize json array
        $software_rate_data = ["s1" =>  $software_one_rate, "s2" => $software_two_rate , "s3" => $software_three_rate , "s4" => $software_four_rate];


         // subject part--------------------------------------------------------
        // gettting data from front end


        //year
        $first_year = $request->subject["year_1"];
        $second_year = $request->subject["year_2"];
        $third_year = $request->subject["year_3"];
        $fourth_year = $request->subject["year_4"];

        //semester
        $semester_one=$request->subject["semster_id"];
        $semester_two=$request->subject["subject_two_id"];
        $semester_three=$request->subject["third_year_R"];
        //there no semester for fourth year subjects

        //subject
        $subject_one=$request->subject["subject_one"];
        $subject_two=$request->subject["subject_two"];
        $subject_three=$request->subject["subject_three"];
        $subject_four=$request->subject["subject_four"];

        //rating
        $rating_one=$request->subject["subject_one_rate"];
        $rating_two=$request->subject["subject_two_rate"];
        $rating_three=$request->subject["subject_three_rate"];
        $rating_four=$request->subject["subject_four_rate"];
        
        //Array
        $selected_year = ["year1" =>  $first_year, "year2" => $second_year , "year3" => $third_year , "year4" => $fourth_year];
        $selected_semester = ["sse1" =>  $semester_one, "sse2" => $semester_two , "sse3" => $semester_three];
        $selected_subject = ["ssa1" =>  $subject_one, "ssa2" => $subject_two , "ssa3" => $subject_three , "ssa4" => $subject_four];
        $selected_rating = ["sr1" =>  $rating_one, "sr2" => $rating_two , "sr3" => $rating_three , "sr4" => $rating_four];
        //Education qualification part--------------------------------------------------

        //Name part
        $qualifi_one=$request->education_qualification["qualification_one_title"];
        $qualifi_two=$request->education_qualification["qualification_two_title"];
        $qualifi_three=$request->education_qualification["qualification_three_title"];

        //Description part
        $Des_one=$request->education_qualification["qualification_one_descripition"];
        $Des_two=$request->education_qualification["qualification_two_descripition"];
        $Des_three=$request->education_qualification["qualification_three_descripition"];
      

        //Json array
        $name_of_Edu_Qulaify=["n1"=>  $qualifi_one, "n2"=>$qualifi_two ,"n3"=>$qualifi_three];
        $Des_of_Edu_Qulaify=["d1"=>  $Des_one, "d2"=>$Des_two ,"d3"=>$Des_three];
        


        //Work Experience part------------------------------------------------------
        $work_exp_name_one=$request->work_experince["work_experince_one_title"];
        $work_exp_name_two=$request->work_experince["work_experince_two_title"];
        $work_exp_name_three=$request->work_experince["work_experince_three_title"];
        

        //Work experience description part-------------------------------------------
        $work_exp_des_one=$request->work_experince["work_experince_one_descripition"];
        $work_exp_des_two=$request->work_experince["work_experince_two_descripition"];
        $work_exp_des_three=$request->work_experince["work_experince_three_descripition"];


        //Array
        $work_exp_name=["n1"=>$work_exp_name_one, "n2"=>$work_exp_name_two,"n3"=>$work_exp_name_three];
        $work_exp_detail=["d1"=>$work_exp_des_one, "d2"=>$work_exp_des_two,"d3"=>$work_exp_des_three];

        
        $register_id = NULL;
        $Lecture_regs_id = NULL;



        //Saving software
        $data = Software::create([
            'registrations_id' => $register_id,
            'Lecture_regs_id' => $Lecture_regs_id,
            'software1' => $software_one,
            'software2' => $software_two,
            'software3' => $software_three,
            'software4' => $software_four,
            'rating' => $software_rate_data,
        ]);

        //Saving subjects
        $data = subject::create([
            'registrations_id' => $register_id,
            'Lecture_regs_id' => $Lecture_regs_id,
            'year' => $selected_year,
            'semester' => $selected_semester,
            'subject' => $selected_subject,
            'rating' => $selected_rating,
           
        ]);

        //Saving education qualification
        $data=edu_qualification::create([
        'registrations_id'=>$register_id,
        'lecture_regs_id'=> $Lecture_regs_id,
        'name'=>$name_of_Edu_Qulaify,
        'description'=>$Des_of_Edu_Qulaify,
        ]);

        //Saving Work experience
        $data=work_exp::create([
            'registrations_id'=>$register_id,
            'lecture_regs_id'=> $Lecture_regs_id,
            'name'=>$work_exp_name,
            'description'=>$work_exp_detail,
        ]);

        return $data;

    }
}
