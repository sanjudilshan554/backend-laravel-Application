<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kuppi;
use App\Models\Registration;
use App\Models\AcceptkuppiRequest;

class KuppiController extends Controller
{
    public function store(Request $request){
    

        
        $validate_data=$request ->validate([
            
            'revison_name'=>['required'],
            'local_id'=>['required'],//local host reg id
            'ConductorRegid'=>['required'],
            'subject'=>['required'],
            'free_time'=>['required'],
            'place'=>['required'],
            'name'=>['required'],
            'email'=>['required','email'],
            'regId'=>['required'],
            'type'=>['required'],
            'members'=>['required'],
        ]);

       $data=kuppi::create([
            'kuppiname'=> $validate_data['revison_name'],
            'registrations_id'=> $validate_data['local_id'],//local host reg id
            'cunductor_id'=> $validate_data['ConductorRegid'],//local host reg id
            'subject'=> $validate_data['subject'],
            'freetime'=> $validate_data['free_time'],
            'place'=> $validate_data['place'],
            'seniorName'=> $validate_data['name'],
            'senioremail'=> $validate_data['email'],
            'seniourregid'=> $validate_data['regId'],
            'on/off'=> $validate_data['type'],
            'members'=>$validate_data['members'],
            
        ]);

        //return response()->json(['data'=>$data,'status'=>'200']);

        //variable name=modelname::with('model name')->where('primary key or somthing',$request->id)->get();
        $kuppidata = kuppi::with('kuppi')->where('registrations_id',$request->id)->get();
       

        return $kuppidata;

        //want to migrate
    }
        
       
    public function rfo(Request $request){
        

        $Accepter_id=$request->Accepter_id;
       
        

        
        $data=Registration::select('registrations.*','kuppis.*')
        ->join('kuppis','registrations.id','=','kuppis.registrations_id')
        ->where('kuppis.cunductor_id',$Accepter_id)
        ->get();
        

        
        //  $data=kuppi::where('cunductor_id',$Accepter_id)->get();
      

         return response()->json(['data'=>$data,'status'=>'200','message'=>'ok']);
    }

    

    public function countforhome(Request $request){
   
        $currentLocalhostId=$request->localid;
        
        $data=kuppi::where('cunductor_id',$currentLocalhostId)
        ->get()->count();

        
        $data2=AcceptkuppiRequest::where('Rrequester_id',$currentLocalhostId)
        ->get()->count();
        
        
        return response()->json(['data'=>$data,'data2'=>$data2,'response'=>'200']);

        
    }

    
}