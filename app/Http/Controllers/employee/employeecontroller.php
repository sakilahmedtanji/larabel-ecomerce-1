<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class employeecontroller extends Controller
{
     public function Employeedashboard(){
        return view('employee.employee-dashboard');
    }
    public function Employeelogout(){
        Auth::logout();
        return redirect('/employee/login');
    }
}
