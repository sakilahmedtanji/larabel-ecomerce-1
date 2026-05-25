<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class catagorycontroller extends Controller
{
    public function productcatagory()
    {

        return view('admin.catagory.create');
    }
    public function store(Request $request)
    {
        $category =  new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if (isset($request->image)) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/catagory', $imageName);

            $category->image = url('admin/catagory/' . $imageName);
        }

        $category->save();
         return redirect('/product/catagory-manage/post/store');
    }
    public function storehouse()
    {
        $catagories = Category::get();

        return view('/admin/catagory/catagorystore', compact('catagories'));
    }

    public function storeedit($id)
    {
        $catagory = Category::find($id);

        return view('/admin/catagory/editcatagory', compact('catagory'));
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if (isset($request->image)) {
            if($category->image && file_exists('admin/catagory' .basename($category->image))){
                unlink('admin/catagory' .basename($category->image));
            }
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/catagory', $imageName);

            $category->image = url('admin/catagory/' . $imageName);
        }

        $category->save();
        return redirect('/product/catagory-manage/post/store');
    }
    public function storedelete($id){
$category = Category::find($id);
if($category->image && file_exists('admin/catagory' .basename($category->image))){
                unlink('admin/catagory' .basename($category->image));
            }
$category -> delete();
return redirect()->back();
    }
}
