<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;
class ClientReviewController extends Controller
{
    public function allReviews(){
        $reviews=ClientReview::all();
        return $reviews;
    }


    public function allreview(){
        $review=ClientReview::get();
        return view('backend.review.all_review',compact('review'));
    }

    public function addreview(){
      return view('backend.review.add_review');  
    }


    public function insertreview(Request $request){
        $request->validate([
           'name'=>'required',
           'desc'=>'required',
           'photo'=>'required|max:5120'
        ]);


        

        $review_img=$request->file('photo');
        $img_name=hexdec(uniqid()). "."  .$review_img->getClientOriginalExtension();
        $location='upload/review/';
        $final_file='http://127.0.0.1:8000/upload/review/'.$img_name;
        $review_img->move($location,$img_name);


        $review1=new ClientReview();
        $review1->client_name=$request->name;
        $review1->client_reviews=$request->desc;
        $review1->client_photo=$final_file;
        $review1->save();

        $notification=array(
          'message'=>'review Inserted Successfully',
          'alert-type'=>'success',

      );
      return Redirect()->route('all_review')->with($notification); 
}


public function edit($id){
    $review=ClientReview::findorFail($id);
    return view('backend.review.edit',compact('review'));
}


public function editreview(Request $request,$id){
    $request->validate([
       'name'=>'required',
       'desc'=>'required',
       
    ]);


    

    $review_img=$request->file('photo');
    if($review_img){
    $img_name=hexdec(uniqid()). "."  .$review_img->getClientOriginalExtension();
    $location='upload/review/';
    $final_file='http://127.0.0.1:8000/upload/review/'.$img_name;
    $review_img->move($location,$img_name);


    $review1= ClientReview::findorFail($id)->update([
    'client_name'=>$request->name,
    'client_reviews'=>$request->desc,
    'client_photo'=>$final_file,
    ]);
    $notification=array(
      'message'=>'review Updated Successfully',
      'alert-type'=>'success',

  );
  return Redirect()->route('all_review')->with($notification); 

}else{
    $review1= ClientReview::findorFail($id)->update([
        'client_name'=>$request->name,
        'client_reviews'=>$request->desc,
        
        ]);
        $notification=array(
          'message'=>'review Updated Successfully',
          'alert-type'=>'success',
    
      );
      return Redirect()->route('all_review')->with($notification); 
}
}

public function deletereview($id){
    $delete=ClientReview::findorFail($id)->forceDelete();

    $notification=array(
        'message'=>'review Deleted Successfully',
        'alert-type'=>'success',
  
    );
    return Redirect()->route('all_review')->with($notification); 
}
}
