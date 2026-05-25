<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function customerloginauth(Request $request ){
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password  ])){
            
            if(auth::user()->role== 'customer'){
                return redirect('/customer/dashboard');
            }
            else{
                $role= Auth::user()->role;
                Auth::logout();
                if($role=='admin'){
                    return redirect('/admin/login');
                }
                elseif($role=='employee'){
                    return redirect('/employee/login');
                }
            }
            
        }
        
        else{
            return redirect()->back();
        }
    }
    
   
    public function customerregister(){
        return view('login.customerregister');
    }
    public function customerregisterstore(Request $request){
        $customer = new User();
        $customer -> name = $request -> name;
        $customer -> email = $request -> email;
        $customer -> phone = $request -> phone;
        $customer -> password = Hash::make($request->passeword);
        $customer -> role= 'customer';
        $customer -> save();
        return redirect('/customer/login');
    }
}
