<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\users;
class AdminsideController extends Controller
{
    public function data(){
        $data =  users::all();
         return view('auth.data', compact('data'));
     }
     public function delete($id){
         users::destroy($id);
         return back();
     }
     public function change($id){
         $data=users::find($id);
         return view('auth.change',compact('data'));
     }
     public function change_data(Request $request,$id){
         $data=users::find($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->gender = $request->gender;
         $data->branch = $request->branch;
 
         // Save the updated data
         $res = $data->save();
         if($res){
             return redirect('data');
         }else{
             return back()->with('fail','Something Went Wrong');
         }
         
         
 }
 
}
