<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('pages.login');
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
    }
}
