<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function doLogin(Request $request){
        $validation = Validator::make($request->all(),[
            "email"             =>  'required|email',
            "password"          => 'required'
        ]);

        if($validation->fails()){
            return redirect()->back()
            ->withErrors($validation)
            ->withInput();
        }

        $user = User::Where('email' , '=', $request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put("user",$user);
                return redirect('dashboard');
            }else{
                return redirect()->back()->with('error', 'The password you entered is not correct')->withInput();
            }
        }else{
            return redirect()->back()->with('error', 'The email you entered is not registered')->withInput();
        }
    }

    public function register(Request $request){
        $validation = Validator::make($request->all(),[
            "first_name"        => 'required|string|max:255',
            "last_name"         => 'required|string|max:255',
            "email"             =>  'required|email|unique:users',
            "password"          => 'required',
            "confirm_password"  => 'required_with:password|same:password'
        ],[
            'confirm_password.required_with' => 'Confirm password field is required'
        ]);

        if($validation->fails()){
            return redirect()->back()
            ->withErrors($validation)
            ->withInput();
        }
        $user = new User();

        $user->name = ucwords($request->first_name)." ".ucwords($request->last_name);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if($user){
            return redirect()->back()->with('success', 'User Registered Successfully!');
        }else{
            return redirect()->back()->with('error', 'Unable To Sign Up!');
        }
    }

    public function dashboard(){
        $user = [];
        if(Session::has('user')){
            $user = Session::get('user');
        }
        return view('pages.dashboard',compact('user'));
    }

    public function logout(){
        if(Session::has('user')){
            Session::pull('user');
            return redirect('login');
        }else{
            return redirect('login');
        }
    }
}
