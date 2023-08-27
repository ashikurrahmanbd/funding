<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{
    //register controller for register form view
    public function register_view(){

        return view('frontend.register');
    }

    //Register controller for register form post method
    public function register_post(Request $request){

        //valadating the users email name and pass
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users') // Check for uniqueness in the 'users' table
            ],
            'password' => 'required|string|min:8',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // Set the role based on user count
        if (User::count() === 0) {
            $user->role = 'superadmin';
        } else {
            $user->role = 'admin';
        }

        $user->save();

        return back()->with('success', 'Register Successfully');

    }

    // Login view
    public function login_view(){
        return view('frontend.login');
    }

    // Login post
    public function login_post(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect('/dash-board')->with('login-success', 'Login Successfully');
        }

        return back()->with('login-error', 'Email or Password Error');

    }

    // loggedout controller
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('logout-success', 'Successfully logged out');
    }

    
  
    

  

    

}
