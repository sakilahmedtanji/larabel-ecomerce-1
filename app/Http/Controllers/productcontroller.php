<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function create(){
        return view('admin.product.productadd');
    }
}
