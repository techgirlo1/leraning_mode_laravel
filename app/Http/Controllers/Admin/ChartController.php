<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chart;
class ChartController extends Controller
{
    public function allChart(){
        $chart=Chart::get();
        return response()->json($chart);
    }

    public function chart(){
        $chart=Chart::get();
        return view('backend.chart.all_chart',compact('chart'));
    }

    public function addchart(){
        
        return view('backend.chart.add_chart');
    }


    public function insertchart(Request $request){
        $request->validate([
           'tech'=>'required',
           'proj'=>'required',
           
        ]);


        $chart=new Chart();
        $chart->Technology=$request->tech;
        $chart->Project=$request->proj;
        $chart->save();

        $notification=array(
          'message'=>'chart Inserted Successfully',
          'alert-type'=>'success',

      );
      return Redirect()->route('all_review')->with($notification); 
}


public function edit($id){
    $chart=Chart::findorFail($id);
    return view('backend.chart.edit',compact('chart'));
}


public function editchart(Request $request,$id){
    $request->validate([
       'tech'=>'required',
       'proj'=>'required',
       
    ]);


    $chart=Chart::findorFail($id)->update([
    'Technology'=>$request->tech,
    'Project'=>$request->proj,

    ]);
    $notification=array(
      'message'=>'chart Updated Successfully',
      'alert-type'=>'success',

  );
  return Redirect()->route('all_chart')->with($notification); 
}


public function deletechart($id){
$delete=Chart::findorFail($id)->forceDelete();


$notification=array(
    'message'=>'chart Deleted Successfully',
    'alert-type'=>'success',

);
return Redirect()->route('all_chart')->with($notification); 
}


}