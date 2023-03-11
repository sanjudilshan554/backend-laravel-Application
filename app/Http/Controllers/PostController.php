<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function formSubmit(Request $request)
    {
        if($request->image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $url = $request->image->move(public_path('images'), $imageName);
            $description = $request->description;
    
            $validate_data=$request->validate([
                'description'=>['required'],
            ]);
            $reg_id = NULL;
            Post::create([
                'description'=>$validate_data['description'],
                'url'=> $url,
                'registrations_id'=> $reg_id
                
            ]);
        } else {
            return response()->json(['success'=>'Upload a image.']);
        }
    	 return response()->json(['success'=>'You have successfully upload image.']);
    }
}

