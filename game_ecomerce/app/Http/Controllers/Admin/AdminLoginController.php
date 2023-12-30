<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminLogin(){
        return view("admin.login");
    }
    public function pAdminLogin(Request $request){
        $admin = $request->only("email","password");
        if(Auth::guard('admin')->attempt($admin)){
            return view("admin.home");
        }
        return redirect()->route("admin.login")->with('error','');
    }
    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('client.homepage.index');
    }
}
