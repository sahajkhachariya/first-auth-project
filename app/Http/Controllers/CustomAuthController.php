<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class CustomAuthController extends Controller
{
    //
    public function login(){
        return view("auth.login");
    }
    
    public function register(){
        return view("auth.register");
    }
    public function registeruser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'branch'=>'required',
            'gender'=>'required',
            'password'=>'required',

        ]);
        $user = new users();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->branch=$request->branch;
        $user->gender=$request->gender;
        $user->password= Hash::make($request->password);
        $result=$user->save();
        if($result){
            return back()->with('success','you have registered successfully');

        }else{
            return back()->with('fail','something wrong');
        }
    }
    public function loginuser(Request $request){
        $request->validate([
           
            'email'=>'required|email|',
            'password'=>'required',

        ]);
        $users = users:: where('email','=',$request->email)->first();
        if($users){
            if(Hash::check($request->password, $users->password)){
               $request->session()->put('loginid',$users->id);
               return redirect('home');
            }
            else{
                return back()->with('fail','password does not match');
            }

        }else{
            return back()->with('fail','this email is not registered');
        }
    }
    public function home(){
        $data = array ();
        if(Session::has('loginid')){
            $users = users::where('id','=',Session::get('loginid'))->first();
        }
        return view('home',['data' => $users]);
    }
    public function logout(){
        if(Session::has('loginid')){
            Session::pull('loginid');
            return redirect('login');
        }
    }
    



public function showChangePasswordForm()
{
    return view('auth.changepass');
}

public function changePassword(Request $request)
{
    // Correct validation rule
    $request->validate([
        'email' => 'required|email',
        'user_id' => 'required|integer',
        'old_password' => 'required',
        'new_password' => 'required|min:8', // Use 'min' for minimum length
    ]);

    // Retrieve user from the database
    $user = users::where('email', $request->email)
                ->where('id', $request->user_id)
                ->first();

    if ($user && Hash::check($request->old_password, $user->password)) {
        // Change the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');
        return redirect()->back(); // Redirect back with success message
    } else {
        Session::flash('fail', 'Invalid email, user ID, or old password.');
        return redirect()->back(); // Redirect back with failure message
    }
}

}
