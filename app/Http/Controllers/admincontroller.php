<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    public function admindashboard(){
        return view('admin.admin-dashboard');
    }
    public function adminlogout(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
