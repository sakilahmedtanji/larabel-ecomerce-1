<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
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
}
