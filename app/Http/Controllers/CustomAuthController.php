<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class CustomAuthController extends Controller
{
    //
   public function login(){
        if (Auth::check()) {
            return redirect()->route('home'); // Redirect to home if already logged in
        }
        return view('auth.login');
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
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login successful');
        } else {
            return back()->with('fail', 'Incorrect email or password');
        }
    }
    public function home(){
        $data = Auth::user();
        return view('auth.home', ['data' => $data]);
    }
    public function logout(){
        Auth::logout(); // Logout the user
        Session::forget('loginid'); // Clear login session data
    
        return redirect('/home')->with('success', 'You have been logged out successfully.');
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
           'confirm_password' => 'required|same:new_password',
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
