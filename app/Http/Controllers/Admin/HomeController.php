<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
class HomeController extends Controller
{
    public function getvideoDetails(){
        $home=Home::select('video_url','video_desc')->get();
        return $home;
    }



    public function gethomeDetails(){
        $home=Home::select('total_project','total_client','total_hours')->get();
        return $home;
    }


    public function hometitleDetails(){
        $home=Home::select('home_title','home_subtitle')->get();
        return $home;
    }

    public function gettechDetails(){
        $home=Home::select('tech_desc')->get();
        return $home;
    }

    public function getimageDetails(){
        $home=Home::select('about_img')->get();
        return $home;
    }

    public function home(){
        $home=Home::get();
        return view('backend.home.all_home',compact('home'));  
    }


    public function addhome(){
        return view('backend.home.add_home');  
    }


    public function inserthome(Request $request){
        $request->validate([
             'title'=>'required',
             'sub'=>'required',
             'tech'=>'required',
             'desc'=>'required',
             'client'=>'required',
             'proj'=>'required',
             'hour'=>'required',
             'img1'=>'required|max:2048|image|mimes:jpeg,png,jpg,gif'
        ]);

        $home_file=$request->file('img1');
        $img_name=hexdec(uniqid()).  "." .$home_file->getClientOriginalExtension();
        $location='upload/home/';
        $final_file='http://127.0.0.1:8000/upload/home/' .$img_name;
        $home_file->move($location,$img_name);


        $home_file=$request->file('vid');
        $vid_name=hexdec(uniqid()).  "." .$home_file->getClientOriginalExtension();
        $location='upload/home/';
        $final_file2='http://127.0.0.1:8000/upload/home/' .$vid_name;
        $home_file->move($location,$vid_name);


        $home=new Home();
        $home->home_title=$request->title;
        $home->home_subtitle=$request->sub;
        $home->tech_desc=$request->tech;
        $home->video_desc=$request->desc;
        $home->total_client=$request->client;
        $home->total_project=$request->proj;
        $home->total_hours=$request->hour;
        $home->video_url=$final_file2;
        $home->about_img=$final_file;
        $home->save();

        $notification=array(
            'message'=>'home inserted Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_home')->with($notification); 
}


public function edit($id){
      $home=Home::findorFail($id);
      return view('backend.home.edit',compact('home'));
}

public function edithome(Request $request,$id){
    $request->validate([
         'title'=>'required',
         'sub'=>'required',
         'tech'=>'required',
         'desc'=>'required',
         'client'=>'required',
         'proj'=>'required',
         'hour'=>'required',
         
    ]);

    $home_file=$request->file('img1');
    if($home_file){
    $img_name=hexdec(uniqid()).  "." .$home_file->getClientOriginalExtension();
    $location='upload/home/';
    $final_file='http://127.0.0.1:8000/upload/home/' .$img_name;
    $home_file->move($location,$img_name);


    $home= Home::findorFail($id)->update([
        'home_title'=>$request->title,
        'home_subtitle'=>$request->sub,
        'tech_desc'=>$request->tech,
        'video_desc'=>$request->desc,
        'total_client'=>$request->client,
        'total_project'=>$request->proj,
        'total_hours'=>$request->hour,
        'about_img'=>$final_file,
        
        
        ]);
        $notification=array(
            'message'=>'home Updated Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_home')->with($notification); 


}elseif($home_file=$request->file('vid')) {
    $vid_name=hexdec(uniqid()).  "." .$home_file->getClientOriginalExtension();
    $location='upload/home/';
    $final_file2='http://127.0.0.1:8000/upload/home/' .$vid_name;
    $home_file->move($location,$vid_name);


    $home= Home::findorFail($id)->update([
    'home_title'=>$request->title,
    'home_subtitle'=>$request->sub,
    'tech_desc'=>$request->tech,
    'video_desc'=>$request->desc,
    'total_client'=>$request->client,
    'total_project'=>$request->proj,
    'total_hours'=>$request->hour,
    'video_url'=>$final_file2,
    ]);
    $notification=array(
        'message'=>'home Updated Successfully',
        'alert-type'=>'success',

    );
    return Redirect()->route('all_home')->with($notification); 
}else{
    $home= Home::findorFail($id)->update([
        'home_title'=>$request->title,
        'home_subtitle'=>$request->sub,
        'tech_desc'=>$request->tech,
        'video_desc'=>$request->desc,
        'total_client'=>$request->client,
        'total_project'=>$request->proj,
        'total_hours'=>$request->hour,
        ]);
        $notification=array(
            'message'=>'home Updated Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_home')->with($notification); 
}
}

public function deletehome($id){
        $home=Home::findorFail($id)->delete();


        $notification=array(
            'message'=>'home Deleted Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_home')->with($notification);
        
}
}
