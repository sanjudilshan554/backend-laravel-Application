<?php

namespace App\Http\Controllers;
use App\Models\revision;
use App\Models\RevisionAccept;



use Illuminate\Http\Request;

class RevisionController extends Controller
{
    public function store(Request $request){
     

        $validate_data=$request ->validate([
            'Requester_id'=>['required'],
            'lectureRegId'=>['required'],
            'revName'=>['required'],
            'subject'=>['required'],
            'contact'=>[''],
            'freetime'=>['required'],
            'lecHallName'=>['required'],
            'lectureName'=>['required'],
            'lecturemail'=>['required','email'],
            'lectureempID'=>['required'],
            'members'=>['required'],
        ]);

        $data=revision::create([
            'Requester_id'=>$validate_data['Requester_id'],
            'lectureRegId'=>$validate_data['lectureRegId'],
            'revName'=>$validate_data['revName'],
            'subject'=>$validate_data['subject'],
            'contact'=>$validate_data['contact'],
            'freetime'=>$validate_data['freetime'],
            'lecHallName'=>$validate_data['lecHallName'],
            'lectureName'=>$validate_data['lectureName'],
            'lecturemail'=>$validate_data['lecturemail'],
            'lectureempID'=>$validate_data['lectureempID'],
            'members'=>$validate_data['members'],
        ]);
        
        return response()->json(['data'=>$data,'status'=>'200','message'=>'Request send successfully']);
    }

    public function request(Request $request){
        $LectureRegId=$request->LectureLocalhost;
       

        $Lecturedata=revision::select('revisions.*','lecture_regs.*')
        ->join('lecture_regs','lecture_regs.id','=','revisions.lectureRegId')
        ->where('revisions.lectureRegId',$LectureRegId)
        ->get();

        $StudentData=revision::select('revisions.*','registrations.*')
        ->join('registrations','registrations.id','=','revisions.Requester_id')
        ->where('revisions.lectureRegId',$LectureRegId)
        ->get();

         return response()->json(['data'=>$Lecturedata,'data2'=>$StudentData,'status'=>'200']);
    }

    public function datasend(Request $request){
        $localID=$request->localid;

        $data=revision::where('lectureRegId',$localID)->get()->count();  

        $data2=RevisionAccept::where('StudentLocalhost',$localID)->get()->count(); 
        
        return response()->json(['data'=>$data,'data2'=>$data2,'status'=>'200']);
        
    }

    public function sender(Request $request){
        $lectureLocal= $request->LectureLocalhost;

        $data=revision::select('registrations.*')
        ->join('registrations','registrations.id','=','revisions.Requester_id')
        ->where('revisions.lectureRegId',$lectureLocal)
        ->get();

        $Student_name=$data[0]->fname;
        $requester_contact=$data[0]->mobNo;
        $requester_currentYear=$data[0]->currentYear;

         return response()->json(['data1'=>$Student_name,'data2'=>$requester_contact,'data3'=>$requester_currentYear,'status'=>'200']);
    }
}