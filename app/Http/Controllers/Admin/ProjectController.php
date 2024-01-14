<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function getProject(){
        $project=Project::limit(3)->get();
        return $project;
    }

    public function getAllProject(){
        $project=Project::get();
        return $project;
    }

    public function getProjectDetails($projectid){
        $id=$projectid;
        $project=Project::where('id',$id)->get();
        return $project;
    }

    public function allproject(){
        $project=Project::get();
        return view('backend.project.all_project',compact('project'));
    }


    public function addproject(){
        return view('backend.project.add_project');
    }

    public function insertproject(Request $request){
            $request->validate([
                 'name'=>'required',
                 'desc'=>'required',
                 'feat'=>'required',
                 'preview'=>'required',
                 'img1'=>'required|max:2048|image|mimes:jpeg,png,jpg,gif',
                 'img2'=>'required|max:2048|image|mimes:jpeg,png,jpg,gif'
            ]);

            $project_img=$request->file('img1');
            $img_name=hexdec(uniqid()).  "." .$project_img->getClientOriginalExtension();
            $location='upload/project/';
            $final_file='http://127.0.0.1:8000/upload/project/' .$img_name;
            $project_img->move($location,$img_name);


            $project_img2=$request->file('img2');
            $img_name=hexdec(uniqid()).  "." .$project_img2->getClientOriginalExtension();
            $location='upload/project/';
            $final_file2='http://127.0.0.1:8000/upload/project/' .$img_name;
            $project_img2->move($location,$img_name);


            $project=new Project();
            $project->project_name=$request->name;
            $project->project_desc=$request->desc;
            $project->project_features=$request->feat;
            $project->live_preview=$request->preview;
            $project->image_1=$final_file;
            $project->image_2=$final_file2;
            $project->save();

            $notification=array(
                'message'=>'Project inserted Successfully',
                'alert-type'=>'success',
        
            );
            return Redirect()->route('all_project')->with($notification); 
    }


    public function edit($id){
        $project=Project::findorFail($id);
        return view('backend.project.edit',compact('project'));
    }



    public function editproject(Request $request,$id){
        $request->validate([
             'name'=>'required',
             'desc'=>'required',
             'feat'=>'required',
             'preview'=>'required',
             
        ]);

        $project_img=$request->file('img1');
        if($project_img){
        $img_name=hexdec(uniqid()).  "." .$project_img->getClientOriginalExtension();
        $location='upload/project/';
        $final_file='http://127.0.0.1:8000/upload/project/' .$img_name;
        $project_img->move($location,$img_name);


        $project= Project::findorFail($id)->update([
            'project_name'=>$request->name,
            'project_desc'=>$request->desc,
            'project_features'=>$request->feat,
            'live_preview'=>$request->preview,
            'image_1'=>$final_file,
            
            
            ]);
            $notification=array(
                'message'=>'Project Updated Successfully',
                'alert-type'=>'success',
        
            );
            return Redirect()->route('all_project')->with($notification); 

        }elseif($project_img2=$request->file('img2')){
        $img_name=hexdec(uniqid()).  "." .$project_img2->getClientOriginalExtension();
        $location='upload/project/';
        $final_file2='http://127.0.0.1:8000/upload/project/' .$img_name;
        $project_img2->move($location,$img_name);


        $project= Project::findorFail($id)->update([
        'project_name'=>$request->name,
        'project_desc'=>$request->desc,
        'project_features'=>$request->feat,
        'live_preview'=>$request->preview,
        'image_2'=>$final_file2,
        
        ]);
        $notification=array(
            'message'=>'Project Updated Successfully',
            'alert-type'=>'success',
    
        );
        return Redirect()->route('all_project')->with($notification); 
    }else{
        $project= Project::findorFail($id)->update([
            'project_name'=>$request->name,
            'project_desc'=>$request->desc,
            'project_features'=>$request->feat,
            'live_preview'=>$request->preview,
            
            
            ]);
            $notification=array(
                'message'=>'Project Updated Successfully',
                'alert-type'=>'success',
        
            );
            return Redirect()->route('all_project')->with($notification);  
    }
}


public function deleteproject($id){
    $project=Project::findorFail($id)->forceDelete();
    $notification=array(
        'message'=>'Project Deleted Successfully',
        'alert-type'=>'success',

    );
    return Redirect()->route('all_project')->with($notification);  
}



   
}
