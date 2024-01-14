<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
class CoursesController extends Controller
{
    public function insertCourse(){
     $course=Courses::limit(4)->get();
     return  $course; 
    }


    public function insertAllCourse(){
        $course=Courses::get();
     return  $course; 
    }



    public function insertCourseDetails($courseid){
        $id=$courseid ;
        $course=Courses::where('id',$id)->get();
        return $course;
         
     
    }


    
    public function allcourse(){
        $course=Courses::get();
          return view('backend.course.all_course',compact('course'));
    }


    public function addcourse(){
          return view('backend.course.add_course');
    }


    public function insertcourses(Request $request){
        $request->validate([
             'name'=>'required',
             'desc1'=>'required',
             'name2'=>'required',
             'desc'=>'required',
             'duration'=>'required',
             'student'=>'required',
             'lecture'=>'required',
             'skill'=>'required',
             'img1'=>'required|max:2048|image|mimes:jpeg,png,jpg,gif'
        ]);

        $course_file=$request->file('img1');
        $img_name=hexdec(uniqid()).  "." .$course_file->getClientOriginalExtension();
        $location='upload/course/';
        $final_file='http://127.0.0.1:8000/upload/course/' .$img_name;
        $course_file->move($location,$img_name);


        $course_file=$request->file('vid');
        $vid_name=hexdec(uniqid()).  "." .$course_file->getClientOriginalExtension();
        $location='upload/course/';
        $final_file2='http://127.0.0.1:8000/upload/course/' .$vid_name;
        $course_file->move($location,$vid_name);


        $course=new Courses();
        $course->short_title=$request->name;
        $course->short_desc=$request->desc1;
        $course->long_title=$request->name2;
        $course->long_desc=$request->desc;
        $course->total_duration=$request->duration;
        $course->total_student=$request->student;
        $course->total_lecture=$request->lecture;
        $course->skill_all=$request->skill;
        $course->video_url=$final_file2;
        $course->small_img=$final_file;
        $course->save();

        $notification=array(
            'message'=>'course inserted Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_course')->with($notification); 
}


public function edit($id){
    $course=Courses::findorFail($id);
return view('backend.course.edit',compact('course'));
}



public function editcourse(Request $request,$id){
    $request->validate([
         'name'=>'required',
         'desc1'=>'required',
         'name2'=>'required',
         'desc'=>'required',
         'duration'=>'required',
         'student'=>'required',
         'lecture'=>'required',
         'skill'=>'required',
         
    ]);

    $course_file=$request->file('img1');
    if($course_file){
    $img_name=hexdec(uniqid()).  "." .$course_file->getClientOriginalExtension();
    $location='upload/course/';
    $final_file='http://127.0.0.1:8000/upload/course/' .$img_name;
    $course_file->move($location,$img_name);


    $course= Courses::findorFail($id)->update([
        'short_title' =>  $request->name ,
        'short_desc'=>$request->desc1,
        'long_title'=>$request->name2,
        'long_desc'=>$request->desc,
        'total_duration'=>$request->duration,
        'total_student'=>$request->student,
        'total_lecture'=>$request->lecture,
        'skill_all'=>$request->skill,
        'small_img'=>$final_file,
        ]);
    
        $notification=array(
            'message'=>'course Updated Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_course')->with($notification);

    }elseif($course_vid=$request->file('vid')){

    
    $vid_name=hexdec(uniqid()).  "." .$course_vid->getClientOriginalExtension();
    $location='upload/course/';
    $final_file2='http://127.0.0.1:8000/upload/course/' .$vid_name;
    $course_vid->move($location,$vid_name);


    $course= Courses::findorFail($id)->update([
    'short_title' =>  $request->name ,
    'short_desc'=>$request->desc1,
    'long_title'=>$request->name2,
    'long_desc'=>$request->desc,
    'total_duration'=>$request->duration,
    'total_student'=>$request->student,
    'total_lecture'=>$request->lecture,
    'skill_all'=>$request->skill,
    'video_url'=>$final_file2,
    
    ]);

    $notification=array(
        'message'=>'course Updated Successfully',
        'alert-type'=>'success',

    );
    return Redirect()->route('all_course')->with($notification);
    
}else{
    $course= Courses::findorFail($id)->update([
        'short_title' =>  $request->name ,
        'short_desc'=>$request->desc1,
        'long_title'=>$request->name2,
        'long_desc'=>$request->desc,
        'total_duration'=>$request->duration,
        'total_student'=>$request->student,
        'total_lecture'=>$request->lecture,
        'skill_all'=>$request->skill,
        
        ]);
    
        $notification=array(
            'message'=>'course Updated Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_course')->with($notification);
}
}

public function deleteproject($id){
   $course=Courses::findorFail($id)->forceDelete();
   $notification=array(
    'message'=>'course Deleted Successfully',
    'alert-type'=>'success',

);
return Redirect()->route('all_course')->with($notification);
}

}
