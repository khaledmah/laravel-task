<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Section2;
use Carbon\Carbon;
class Section2Controller extends Controller
{
    
     public function index(Request $request){
        $sections2 = Section2::orderBy('order','asc')->get();
        return view('sections2',compact('sections2'));
    }
    public function storesection2(Request $request){
        

        
            $section2 = new Section2();
            $section2->Name=$request->Name;
            $section2->Birthdate=$request->Birthdate;
            $section2->save();
             $data[]=[
                'id' => $section2->id,
                'Name'=>$section2->Name,
                'Birthdate'=>$section2->Birthdate,
                'created_at'=>Carbon::parse($section2->created_at)->format('M,d Y h:i a')];

        return response()->json(['data'=>$data,'status'=>'success','message'=>'Saved Successfully']);
    }

     public function updatesection2($id,Request $request){
        
         $section2 = Section2::where('id',$id)->first();
         $section2->Name=$request->Name;
         $section2->Birthdate=$request->Birthdate;
         $section2->update();
         $data[]=[
                'id' => $section2->id,
                'Name'=>$section2->Name,
                'Birthdate'=>$section2->Birthdate,
                'created_at'=>Carbon::parse($section2->created_at)->format('M,d Y h:i a')];
  
       return response()->json(['data'=>$data,'status'=>'success','message'=>'updated Successfully']);

    }

     

   
    public function deletesection2($id){
         $section2 = Section2::where('id',$id)->delete();
   
       
       return response()->json(['message'=>'deleted Successfully','status'=>'success']);

    }
   
    
     
}


