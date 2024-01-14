<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    public function allservices(){
        $service=Service::latest()->get();
        return $service;
    }


    public function allservice(){
        $service=Service::get();
        return view('backend.service.all_service',compact('service'));
    }


    public function addservice(){
        return view('backend.service.index');
    }

    public function insertservice(Request $request){
              $request->validate([
                 'name'=>'required',
                 'desc'=>'required',
                 'photo'=>'required|max:2048'
              ]);


              

              $service_img=$request->file('photo');
              $img_name=hexdec(uniqid()). "."  .$service_img->getClientOriginalExtension();
              $location='upload/service/';
              $final_file='http://127.0.0.1:8000/upload/service/'.$img_name;
              $service_img->move($location,$img_name);


              $service1=new Service();
              $service1->service_name=$request->name;
              $service1->service_desc=$request->desc;
              $service1->logo=$final_file;
              $service1->save();

              $notification=array(
                'message'=>'Service Inserted Successfully',
                'alert-type'=>'success',
    
            );
            return Redirect()->route('all_service')->with($notification); 
    }


    public function edit($id){
        $edit=Service::findorFail($id);
        return view('backend.service.edit',compact('edit'));
    }



    public function editservice(Request $request,$id){
        $request->validate([
           'name'=>'required',
           'desc'=>'required',
        ]);


        

        $service_img=$request->file('photo');
        if($service_img){
        @unlink("upload/service/" .$service1->logo);
        $img_name=hexdec(uniqid()). "."  .$service_img->getClientOriginalExtension();
        $location='upload/service/';
        $final_file='http://127.0.0.1:8000/upload/service/'.$img_name;
        $service_img->move($location,$img_name);


        $service1=Service::findorFail($id)->update([
        'service_name'=> $request->name,
        'service_desc'=>$request->desc,
        'logo'=>$final_file,
        
        ]);

        $notification=array(
            'message'=>'Service updated Successfully',
            'alert-type'=>'success',
  
        );
        return Redirect()->route('all_service')->with($notification); 
    }else{
        $service1=Service::findorFail($id)->update([
            'service_name'=> $request->name,
            'service_desc'=>$request->desc,
            
            
            ]);  

            $notification=array(
                'message'=>'Service updated Successfully',
                'alert-type'=>'success',
      
            );
            return Redirect()->route('all_service')->with($notification); 
    }
       
}



public function deleteservice($id){
    $delete=Service::findorFail($id)->forceDelete();

    $notification=array(
        'message'=>'Service Deleted Successfully',
        'alert-type'=>'success',

    );
    return Redirect()->route('all_service')->with($notification); 
    
}
}
