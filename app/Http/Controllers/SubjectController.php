<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\Registration;
use App\Models\LectureReg;

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
                            
                     }
                     
                    
                }
               
                else if($year2 == $year){
                    
                    
                    if($sem_select_two==$semester){
                        
                            
                            if($subject==$sub_select_two){
                                
                                $data_subject=subject::where('subject->ssa2',$subject)->get();
                                $year2_arr[$i]=($regid=$data_subject[$i]->registrations_id);
                                
                            }
                           
                    }
                    
                        
                  }
                

                else if($year3 == $year){
                   

                    if($sem_select_three==$semester){
                         
                            if($subject==$sub_select_three){
                                
                                $data_subject=subject::where('subject->ssa3',$subject)->get();
                                $year3_arr[$i]=($regid=$data_subject[$i]->registrations_id);
                                
                            }
                            
                            
                       }
                    
                  }


                else if($year4 == $year){
                    
                    
                            if($subject==$sub_select_four){
                                
                                $data_subject=subject::where('subject->ssa4',$subject)->get();
                                $year4_arr[$i]=($regid=$data_subject[$i]->registrations_id);
                                
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
        
    }

    ///////////////////////////////////////////////////////////////////////////////

    public function searchSubject_lectures(Request $request){

        

        $year = $request->year;
        $semester = $request->semester;
        $subject = $request->subject;

       $year1_arr=array();
       $year2_arr=array();
       $year3_arr=array();
       $year4_arr=array();

      $subject_data = subject::get();

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

                    
                    if($sem_select_one==$semester){
                        
                         if($subject==$sub_select_one){
                           
                                $data_subject=subject::where('subject->ssa1',$subject)->get();
                                $year1_arr[$i]= $data_subject;
                                // $regid=$data_subject[1]->lecture_regs_id;
                                // return $regid;
                                // $year1_arr[$j]= ($regid=$data_subject[1]->lecture_regs_id);
                            
                                
                             }
                                  
                            }
                            
                     }
                     
                    
                
               
                else if($year2 == $year){
                    
                    
                    if($sem_select_two==$semester){
                        
                            
                            if($subject==$sub_select_two){
                                
                                $data_subject=subject::where('subject->ssa1',$subject)->get();
                                $year2_arr[$i]= $data_subject;
                                
                            }
                            
                    }
                    
                        
                  }
                

                else if($year3 == $year){
                   

                    if($sem_select_three==$semester){
                         
                            if($subject==$sub_select_three){
                                
                                $data_subject=subject::where('subject->ssa1',$subject)->get();
                                $year3_arr[$i]= $data_subject;
                                
                            }
                            
                            
                       }
                    
                  }


                else if($year4 == $year){
                    
                    
                            if($subject==$sub_select_four){
                                
                                $data_subject=subject::where('subject->ssa1',$subject)->get();
                                $year4_arr[$i]= $data_subject;
                                
                            }
                            
                      }
            
                  
                  
         }

        //  return [$year1_arr,$year2_arr,$year3_arr,$year4_arr];
        //return $year1_arr;  
        // return $i;
         // there some error here,array come with the inside of some number,so i can't get those number correctly 
         //I have to remove that number or i have to idenfied that number;


        
     
        $ids1=array();
        $ids2=array();
        $ids3=array();
        $ids4=array();

        $arr1lim=(sizeof($year1_arr))-1;
        $arr2lim=(sizeof($year2_arr))-1;
        $arr3lim=(sizeof($year3_arr))-1;
        $arr4lim=(sizeof($year4_arr))-1;

        
        //  return [$arr1lim,$arr2lim,$arr3lim,$arr4lim];

        if($arr1lim>0){
            $unic=(sizeof($year1_arr))+1;
            for($j=0; $j<= $arr1lim; $j++){
                
                // return $year1_arr[2][$j]->id;
                $ids1[$j]=$year1_arr[ $unic][$j]->lecture_regs_id;
                // echo $j;
                // return $year1_arr[3][$j]->lecture_regs_id;
                // return $ids1[$j];
              
              }
                
        }
    

        if($arr2lim-1>0){
            $unic=(sizeof($year2_arr))+1;
            for($j=0; $j<=sizeof($year2_arr); $j++){
                $ids2[$j]=$year2_arr[$unic][$j]->lecture_regs_id;
               
            }
        }
        if($arr3lim-1>0){
             $unic=(sizeof($year3_arr))+1;
            for($j=0; $j<=sizeof($year3_arr); $j++){
                $ids3[$j]=$year3_arr[$unic][$j]->lecture_regs_id;
               
            }
        }
        if($arr4lim-1>0){
             $unic=(sizeof($year4_arr))+1;
            for($j=0; $j<=sizeof($year4_arr); $j++){
                $ids4[$j]=$year4_arr[$unic][$j]->lecture_regs_id;
           
            }
        }
         
       

         $arr1=sizeof($ids1);
         $arr2=sizeof($ids2);
         $arr3=sizeof($ids3);
         $arr4=sizeof($ids4);

        if($arr1>0){
    

            // return response()->json(['message'=>'arry one going up','status'=>'200']);
            
            $users = LectureReg::join('subjects', 'subjects.lecture_regs_id', '=', 'lecture_regs.id')
            ->whereIn('lecture_regs_id', $ids1)
            ->get();
            
            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
           
        }
        else if($arr2>0){
            $users = LectureReg::join('subjects', 'subjects.lecture_regs_id', '=', 'lecture_regs.id')
            ->whereIn('lecture_regs_id', $ids2)
            ->get();

            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
           
        }
        else if($arr3>0){
            $users = LectureReg::join('subjects', 'subjects.lecture_regs_id', '=', 'lecture_regs.id')
            ->whereIn('lecture_regs_id', $ids3)
            ->get();

            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
            
        }
         if($arr4>0){
            $users = LectureReg::join('subjects', 'subjects.lecture_regs_id', '=', 'lecture_regs.id')
            ->whereIn('lecture_regs_id', $ids4)
            ->get();

            if($users) {
                return response()->json(['data'=>$users,'status'=>'200','message'=>'data saved']);
            }
           
        }
        
    }

    
}
