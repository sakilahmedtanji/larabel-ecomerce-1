<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subcatagory;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function create(){
        $catagories = Category::orderby('name','asc')->get();
        $subcatagories = subcatagory::orderby('name','asc')->get();
        return view('admin.product.productadd',compact('subcatagories','catagories'));
    }
}
