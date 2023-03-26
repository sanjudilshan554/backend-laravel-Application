<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\Registration;

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
        // print_r (explode('[0]',$semester)[0]);
        $subject = $request->subject;

       $year1_arr=array();
       $year2_arr=array();
       $year3_arr=array();
       $year4_arr=array();

      $subject_data = subject::get();
    //   $data_new = json_decode($subject_data[0]->year,true);

        $row_count = subject::count();

       for($i = 0;  $i <$row_count; $i++) {
        
        
                $year1= $subject_data[$i]->year['year1'] ;
                $year2= $subject_data[$i]->year['year2'] ;
                $year3= $subject_data[$i]->year['year3'] ;
                $year4= $subject_data[$i]->year['year4'] ;

                $sem_select_one=$subject_data[$i]->semester['sse1'] ;
                $sem_select_two=$subject_data[$i]->semester['sse2'] ;
                $sem_select_three=$subject_data[$i]->semester['sse3'] ;

                $sub_select_one=$subject_data[$i]->subject['ssa1'];
                $sub_select_two=$subject_data[$i]->subject['ssa2'];
                $sub_select_three=$subject_data[$i]->subject['ssa3'];
                $sub_select_four=$subject_data[$i]->subject['ssa4'];
               
                
                if($year1 == $year){

                    
                    //  $result= $year1;
                    //  $data_year = subject::where('year->year1',$result)->get();
                    //  $year1_arr[$i]=($regid=$data_year[$i]->registrations_id);
                    
                    if($sem_select_one==$semester){
                       
                        // $data_semester = subject::where('semester->sse1',$result)->get();
                            // $year1_arr[$i]=($regid=$data_semester[$i]->registrations_id);
                            
                            if($subject==$sub_select_one){
                                $data_subject=subject::where('subject->ssa1',$subject)->get();
                                $year1_arr[$i]=($regid=$data_subject[$i]->registrations_id);
                        
                            }
                            else{
                                echo "no data";
                            }
                     }
                     
                    
                }
               
                else if($year2 == $year){
                    
                    
                    if($sem_select_two==$semester){
                        
                            
                            if($subject==$sub_select_two){
                                
                                $data_subject=subject::where('subject->ssa2',$subject)->get();
                                $year2_arr[$i]=($regid=$data_subject[$i]->registrations_id);
                                
                            }
                            else{
                                echo "no data";
                            }
                    }
                    
                        
                  }
                

                else if($year3 == $year){
                   

                    if($sem_select_three==$semester){
                         
                            if($subject==$sub_select_three){
                                
                                $data_subject=subject::where('subject->ssa3',$subject)->get();
                                $year3_arr[$i]=($regid=$data_subject[$i]->registrations_id);
                                
                            }
                            else{
                                echo "no data";
                            }
                            
                       }
                    
                  }


                else if($year4 == $year){
                    
                    
                            if($subject==$sub_select_four){
                                
                                $data_subject=subject::where('subject->ssa4',$subject)->get();
                                $year4_arr[$i]=($regid=$data_subject[$i]->registrations_id);
                                
                            }
                            else{
                                echo "no data";
                            }
                      }
            
         }
       

        // return [$year1_arr ,$year2_arr, $year3_arr, $year4_arr];
         $arr1=sizeof($year1_arr);
         $arr2=sizeof($year2_arr);
         $arr3=sizeof($year3_arr);
         $arr4=sizeof($year4_arr);

        if($arr1>0){
            // $users = subject::with('Registration')->whereIn('registrations_id', $year1_arr)->get();
            $users = Registration::join('subjects', 'subjects.registrations_id', '=', 'registrations.id')
            ->whereIn('registrations_id', $year1_arr)
            ->get();
            
            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
           
        }
        else if($arr2>0){
            $users = Registration::join('subjects', 'subjects.registrations_id', '=', 'registrations.id')
            ->whereIn('registrations_id', $year2_arr)
            ->get();

            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
           
        }
        else if($arr3>0){
            $users = Registration::join('subjects', 'subjects.registrations_id', '=', 'registrations.id')
            ->whereIn('registrations_id', $year3_arr)
            ->get();

            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
            
        }
         if($arr4>0){
            $users = Registration::join('subjects', 'subjects.registrations_id', '=', 'registrations.id')
            ->whereIn('registrations_id', $year4_arr)
            ->get();

            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
           
        }
        

        // if($arr1>0){
        //     for($j=0; $j<$arr1; $j++){
        //         $id=$year1_arr[$j];
        //         $data=subject::where('registrations_id',$id)->get();
        //         // echo $data ;
        //     }
        // }
        // else if($arr2>0){

        //     for($j=0; $j<$arr2; $j++){
        //         // echo "reg no: $year2_arr[$j] \n";
        //         $id=$year2_arr[$j];
        //         $data=subject::where('registrations_id',$id)->get();
        //         // echo $data ;
        //     }
        // }
        // else if($arr3>0){
        //     for($j=0; $j<$arr3; $j++){
        //         // echo "reg no: $year3_arr[$j] \n";
        //         $id=$year3_arr[$j];
        //         $data=subject::where('registrations_id',$id)->get();
        //         // echo $data ;
        //     }
        // }
        // else if($arr4>0){
        //     for($j=0; $j<$arr4; $j++){
        //         // echo "reg no: $year4_arr[$j] \n";
        //         $id=$year4_arr[$j];
        //         $data=subject::where('registrations_id',$id)->get();
        //         // echo $data;
        //     }
            
        // }
    }
    
}
