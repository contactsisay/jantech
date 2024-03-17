<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{ 
    public function register(){
        return view('register');
    }

    public function registerPost(Request $request){
        $user = new User();
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $old_user = User::where('email','=',$request->email)->get();
        
        if(count($old_user) <= 0){
            //create if there is no record
            $user->save();
            return back()->with('success','Account created successfully');
        }else{            
            return back()->with('error','Account is not created! Email address is already taken');
        }
    }

    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
     
        $credentials = [
            'email'=> $request->email,
            'password' => $request->pass,
        ];

        $users = User::where('email','=',$request->email)->get();
        echo $users;
        if(count($users) > 0){     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect('/home')->with('success','Login Successful!');
            }
        }

        return back()->with('error','The provided credentials do not match our records.');
    }
    
    public function logout(Request $request) {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}
