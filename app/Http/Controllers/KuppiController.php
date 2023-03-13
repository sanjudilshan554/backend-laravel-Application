<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kuppi;

class KuppiController extends Controller
{
    public function store(Request $request){
        
        $validate_data=$request ->validate([
            'kuppiname'=>['required'],
            'registrations_id'=>['required'],//local host reg id
            'subject'=>['required'],
            'freetime'=>['required'],
            'place'=>['required'],
            'seniorName'=>['required'],
            'senioremail'=>['required','email'],
            'seniourregid'=>['required'],
            'onoff'=>['required'],
        ]);

       $data=kuppi::create([
            'kuppiname'=> $validate_data['kuppiname'],
            'registrations_id'=> $validate_data['registrations_id'],//local host reg id
            'subject'=> $validate_data['subject'],
            'freetime'=> $validate_data['freetime'],
            'place'=> $validate_data['place'],
            'seniorName'=> $validate_data['seniorName'],
            'senioremail'=> $validate_data['senioremail'],
            'seniourregid'=> $validate_data['seniourregid'],
            'on/off'=> $validate_data['onoff'],
            
        ]);

        //return response()->json(['data'=>$data,'status'=>'200']);

        //variable name=modelname::with('model name')->where('primary key or somthing',$request->id)->get();
        $kuppidata = kuppi::with('kuppi')->where('registrations_id',$request->id)->get();
       

        return $kuppidata;

        //want to migrate
    }
        
       
    
}
