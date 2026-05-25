<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\subcatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class subcatagorycontroller extends Controller
{
    public function productcatagory(){
        $catagory= Category::orderBy('name','asc')->get();
        return view('admin.subcatagory.create', compact('catagory'));
    }
    public function store(Request $request){
        $subcatagory=  new subcatagory();
        $subcatagory ->name = $request->name;
        $subcatagory ->cat_id = $request->cat_id;
        $subcatagory ->slug = Str::slug($request->name);
        $subcatagory->save();
        return redirect()->back();

    }
    public function storehouse(){
        $catagories= subcatagory::with('catagory')->get();
        
        return view('admin.subcatagory.list' , compact('catagories'));
    }
    public function storeedit($id){
        $subcatagory = subcatagory::find($id);
        $catagory = Category::orderBy('name','asc')->get();
        return view('admin.subcatagory.edit',compact('catagory','subcatagory'));
    }
    public function update(Request $request, $id){
        $subcatagory=  subcatagory::find($id);
        $subcatagory ->name = $request->name;
        $subcatagory ->cat_id = $request->cat_id;
        $subcatagory ->slug = Str::slug($request->name);
        $subcatagory->save();
        return redirect('/product/subcatagory-manage/post/store');
    }
    public function storedelete($id){
        $subcatagory = subcatagory::find($id);
        $subcatagory -> delete();
        return redirect()->back();
    }
}
