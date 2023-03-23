<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
// use Illuminate\Support\Facades\Hash; //Adding hash method to encrypt password

class RegistrationController extends Controller
{
    public function stroe(Request $request){
        
        $validate_data =$request ->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'age'=>['required'],
            'work_place'=>['required'],
            'school'=>['required'],
            'email'=>['required','email'],
            'address'=>['required'],
            'postal_code'=>['required'],
            'city'=>['required'],
            'province'=>['required'],
            'district'=>['required'],
            'coutry'=>['required'],
            'gender'=>['required'],
            'mb_No'=>['required'],
            'current_Degree'=>['required'],
            'current_year'=>['required'],
            'Special_knowledge'=>['required'],
            'Edu_qualification'=>['required'],
            'Fam_soft'=>['required'],
            'Special_Sub'=>['required'],
            'Certification'=>['required'],
            'University_Reg_No'=>['required'],
            'New_Password'=>['required'],
             
        ]);

        $role = "student";
        
        $data=Registration::create([
            //databse item => ahead data / also postman data
            'fname'=> $validate_data['first_name'],
            'lname'=> $validate_data['last_name'],
            'age'=> $validate_data['age'],
            'workingPlace'=> $validate_data['work_place'],
            'school'=> $validate_data['school'],
            'email'=> $validate_data['email'],
            'address'=> $validate_data['address'],
            'postelcode'=> $validate_data['postal_code'],
            'city'=> $validate_data['city'],
            'Province'=> $validate_data['province'],
            'District'=> $validate_data['district'],
            'country'=> $validate_data['coutry'],
            'gender'=> $validate_data['gender'],
            'mobNo'=> $validate_data['mb_No'],
            'currentDegree'=> $validate_data['current_Degree'],
            'currentYear'=> $validate_data['current_year'],
            'SpKnowledge'=> $validate_data['Special_knowledge'],
            'EdQualification'=> $validate_data['Edu_qualification'],
            'FamSoftware'=> $validate_data['Fam_soft'],
            'SubjectKnow'=> $validate_data['Special_Sub'],
            'Certification'=> $validate_data['Certification'],
            'unvRegNo'=> $validate_data['University_Reg_No'],
            // 'password' => Hash::make($validate_data['New_Password']),
            'password'=> $validate_data['New_Password'],
            'role'=> $role,
        ]);
        
        return response()->json(['data'=>$data,'status'=>'200','message'=>'data save']);
    } 
}
