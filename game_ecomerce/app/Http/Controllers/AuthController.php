<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(){
        return view("client.auth.register");
    }

    public function pRegister(Request $request){
        $user = $request->only("email","name");
        $user["password"] = Hash::make($request->password);
        if(!User::create($user)){
            return back()->with("error","Signup error, please check again");
        }
        return redirect()->route("login")->with("success","Signup successfully");
    }

    public function login(){
        return view("client.auth.login");
    }

    public function pLogin(Request $request){
        $login = $request->only("email","password");
        if(! Auth::attempt($login)){
            return redirect()->route("login")->with("error","Wrong email or password");
        }
        return redirect()->route("client.homepage.index")->with("success","Login succesfully");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("client.homepage.index");
    }

}
