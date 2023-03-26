<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kuppi;

class KuppiController extends Controller
{
    public function store(Request $request){
    
        $validate_data=$request ->validate([
            
            'revison_name'=>['required'],
            'local_id'=>['required'],//local host reg id
            'subject'=>['required'],
            'free_time'=>['required'],
            'place'=>['required'],
            'name'=>['required'],
            'email'=>['required','email'],
            'regId'=>['required'],
            'type'=>['required'],
        ]);

       $data=kuppi::create([
            'kuppiname'=> $validate_data['revison_name'],
            'registrations_id'=> $validate_data['local_id'],//local host reg id
            'subject'=> $validate_data['subject'],
            'freetime'=> $validate_data['free_time'],
            'place'=> $validate_data['place'],
            'seniorName'=> $validate_data['name'],
            'senioremail'=> $validate_data['email'],
            'seniourregid'=> $validate_data['regId'],
            'on/off'=> $validate_data['type'],
            
        ]);

        //return response()->json(['data'=>$data,'status'=>'200']);

        //variable name=modelname::with('model name')->where('primary key or somthing',$request->id)->get();
        $kuppidata = kuppi::with('kuppi')->where('registrations_id',$request->id)->get();
       

        return $kuppidata;

        //want to migrate
    }
        
       
    
}
