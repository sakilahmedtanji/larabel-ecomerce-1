<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    public function admindashboard(){
        $order = order::count();
        $pendingorder = order::where('status','pending')->count();
        $confirmedorder = order::where('status','confirmed')->count();
        $deliveredorder = order::where('status','delivered')->count();
        $cancelledorder = order::where('status','cancelled')->count();
        $returnorder = order::where('status','return')->count();
        return view('admin.admin-dashboard',compact('order','pendingorder','confirmedorder','deliveredorder','cancelledorder','returnorder'));
    }
    public function adminlogout(){
        $role= Auth::user()->role;
        if($role=='admin'){
            Auth::logout();
            return redirect('/admin/login');
        }
        elseif($role=='employee'){
            Auth::logout();
            return redirect('/employee/login');
        }
        Auth::logout();
        return redirect('/');
    }
    public function developercontact(){
        return view('admin.developer-contact');
    }
   
}
