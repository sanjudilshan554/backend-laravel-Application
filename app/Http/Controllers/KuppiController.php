<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kuppi;

class KuppiController extends Controller
{
    public function store(Request $request){
        
        $validate_data=$request ->validate([
            'kuppiname'=>['required'],
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
            'subject'=> $validate_data['subject'],
            'freetime'=> $validate_data['freetime'],
            'place'=> $validate_data['place'],
            'seniorName'=> $validate_data['seniorName'],
            'senioremail'=> $validate_data['senioremail'],
            'seniourregid'=> $validate_data['seniourregid'],
            'on/off'=> $validate_data['onoff'],
            
        ]);

        return response()->json(['data'=>$data,'status'=>'200']);
    }
}
