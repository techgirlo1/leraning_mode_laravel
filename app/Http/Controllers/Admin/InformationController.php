<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
class InformationController extends Controller
{


    



    public function info(){
        $info=Information::get();
        return $info;
    }


    public function allinfo(){
        $info=Information::get();
        return view('backend.information.index',compact('info'));
    }

    public function addinfo(){
        return view('backend.information.add_info');
    }


    public function insertinfo(Request $request){
          $request->validate([
              'About'=>'required',
              'Privacy'=>'required',
              'Terms'=>'required',
              'Refund'=>'required'
          ]);

          $info = new Information();
          $info->about=$request->About;
          $info->privacy=$request->Privacy;
          $info->terms=$request->Terms;
          $info->refund=$request->Refund;
          $info->save();
          $notification=array(
            'message'=>'Information Inserted Successfully',
            'alert-type'=>'success',

        );
          return Redirect()->route('all_info')->with($notification);
    }


    


    public function editinfo($id){
            $edit=Information::findorFail($id);
            return view('backend.information.edit',compact('edit'));
    }
    public function storeinfo(Request $request,$id){
        $info=Information::findorFail($id);
        $request->validate([
            'About'=>'required',
            'Privacy'=>'required',
            'Terms'=>'required',
            'Refund'=>'required'
        ]);


        $info=Information::findorFail($id)->update([
           'about'=>$request->About,
           'privacy'=>$request->Privacy,
           'terms'=>$request->Terms,
           'refund'=>$request->Refund
            
        ]);
        $notification=array(
            'message'=>'Information updated Successfully',
            'alert-type'=>'success',

        );
        return Redirect()->route('all_info')->with($notification); 
 }



 public function deleteinfo($id){
         $delete=Information::findorFail($id)->forceDelete();
         $notification=array(
            'message'=>'Information deleted Successfully',
            'alert-type'=>'success',

        );
         return Redirect()->route('all_info')->with($notification); 
 }
 
}
