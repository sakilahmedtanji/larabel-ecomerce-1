<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customercontroller extends Controller
{
     public function customerdashboard(){
        return view('customer.customer-dashboard');
    }
    public function customerlogout(){
        Auth::logout();
        return redirect('/customer/login');
    }
    public function profileview(){
        $authuserid= Auth::user();
        return view('customer.customerview',compact('authuserid'));
    }
    public function profileupdate(Request $request){
        $authuserid= Auth::user()->id;
        $authuser= User::find($authuserid);

       $authuser -> name =  $request->name;
       $authuser -> email =  $request->email;
       $authuser -> phone =  $request->phone;
       if (isset($request->image)) {
            if($authuser->image && file_exists('customer/Image' .basename($authuser->image))){
                unlink('customer/Image' .basename($authuser->image));
            }
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('customer/Image', $imageName);

            $authuser->image = url('customer/Image/' . $imageName);
        }
        
        $authuser->save();
        return redirect()->back();
    }

    public function cradential(){
        $authuser= Auth::user();
       return view('customer.customerc',compact('authuser'));

    }
    public function cradentialupdate(Request $request){
        $authuserid= Auth::user()->id;  
        $authuser= User::find($authuserid);

         if(isset($request->email)){
            $authuser->email= $request->email;
        }
        if(isset($request->old_password) && ($request->password)){
            if(Hash::check($request->old_password,$authuser->password)){
                $authuser->password = Hash::make($request->password);
            }
            else{
                return redirect()->back();
            }
            
        }
        $authuser->save();
        Auth::logout();
        return redirect()->back();
        }
}

//  