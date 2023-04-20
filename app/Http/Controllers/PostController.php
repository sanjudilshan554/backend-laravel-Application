<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function formSubmit(Request $request)
    {
   if ($request->image) {

            $post_image = $request->file('image');
            $name_gen = hexdec(uniqid());
            $img_extention = strtolower($post_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_extention;                                  
            $upload_location = 'image/post/';
            $url = $upload_location . $img_name;
            $post_image->move($upload_location, $img_name);


            $title = $request->title;
            $description = $request->description;

            $validate_data = $request->validate([
                'description' => ['required'],
                'title' => ['required'],
            ]);
            $reg_id = NULL;
            Post::create([
                'title' => $validate_data['title'],
                'description' => $validate_data['description'],
                'url' => 'http://127.0.0.1:8000/'.$url,
                'registrations_id' => $reg_id,

            ]);
        } else {
            return response()->json(['success' => 'Upload a image.']);
        }
        return response()->json(['success' => 'You have successfully upload image.']);
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