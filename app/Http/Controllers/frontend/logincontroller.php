<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function adminlogin(){
        return view('login.adminlogin');
    }
    public function adminloginauth(Request $request ){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password  ])){
            return redirect('/admin/dashboard');
        }
        else{
            return redirect()->back();
        }
    }

    public function employeelogin(){
        return view('login.employeelogin');
    }
    public function employeeloginauth(Request $request ){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password  ])){
            return redirect('/employee/dashboard');
        }
        else{
            return redirect()->back();
        }
    }

    public function customerlogin(){
        return view('login.customerlogin');
    }
    public function customerlogin()
   
}
