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
            $title=$request->title;
            $description = $request->description;
    
            $validate_data=$request->validate([
                'description'=>['required'],
                'title'=>['required'],
            ]);
            $reg_id = NULL;

            
            Post::create([
                'title'=>$validate_data['title'],
                'description'=>$validate_data['description'],
                'url'=> $url,
                'registrations_id'=> $reg_id,
                
            ]);
        } else {
            return response()->json(['success'=>'Upload a image.']);
        }
    	 return response()->json(['success'=>'You have successfully upload image.']);
    }

    public function getPostData()
    {
        $data = Post::get();
        if($data) {
            return response()->json(['post_data'=>$data]);
        } else {
            return response()->json(['failed'=>'no data']);
        }
    }
}