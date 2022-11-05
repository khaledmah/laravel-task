<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Section1;
use App\Models\Section2;
use Carbon\Carbon;
class Section1Controller extends Controller
{
     public function index(Request $request){
        $section1s = Section1::all();
        $section2s = Section2::all();
        return view('index',compact('section1s','section2s'));
    }

    public function storesection1(Request $request){
        

        
            $section1 = new Section1();
            $section1->Name=$request->Name;
            $section1->Birthdate=$request->Birthdate;
            $section1->save();
            $data[]=[
                'id' => $section1->id,
                'Name'=>$section1->Name,
                'Birthdate'=>$section1->Birthdate,
                'created_at'=>Carbon::parse($section1->created_at)->format('M,d Y h:i a')];




        return response()->json(['data'=>$data,'status'=>'success','message'=>'Saved Successfully']);
    }

     public function updatesection1($id,Request $request){
        
         $section1 = Section1::where('id',$id)->first();
         $section1->Name=$request->Name;
         $section1->Birthdate=$request->Birthdate;
         $section1->update();
          $data[]=[
                'id' => $section1->id,
                'Name'=>$section1->Name,
                'Birthdate'=>$section1->Birthdate,
                'created_at'=>Carbon::parse($section1->created_at)->format('M,d Y h:i a')];
  
       return response()->json(['data'=>$data,'status'=>'success','message'=>'updated Successfully']);

    }

     

   
    public function deletesection1($id){
         $section1 = Section1::where('id',$id)->delete();
   
       
       return response()->json(['message'=>'deleted Successfully','status'=>'success']);

    }
   
    
    
}
