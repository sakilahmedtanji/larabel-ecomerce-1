<?php

namespace App\Http\Controllers;
use App\Models\color;
use App\Models\galaryimage;
use App\Models\Product;
use App\Models\Category;
use App\Models\size;
use App\Models\subcatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class productcontroller extends Controller
{
    public function create(){
        $catagories = Category::orderby('name','asc')->get();
        $subcatagories = subcatagory::orderby('name','asc')->get();
        return view('admin.product.productadd',compact('subcatagories','catagories'));
    }
    public function store (Request $request){

    $request->validate([
        'name'=> 'required|string|max:255',
        'sku_code'=> 'nullable|unique:products,sku_code',
        'cat_id'=> 'required|integer',
        'subcat_id'=> 'nullable|integer',
        'buying_price'=> 'required',
        'discount_price'=> 'nullable|integer',
        'regular_price'=> 'required',
        'qty'=> 'required',
        'product_type'=> 'required|string|max:255',
        'description'=> 'required:string',
        'image'=> 'required|image|max:2048',
    ],
    [
        'name.required'=> 'Name de age',
        'name.max'=> 'product er name to 10k word er hoy tui kom disos kn',
        'sku_code.unique'=>'Eki jinish koto jaigai dibar chash bujhi na',
        'cat_id.required'=> 'Catagory na dile product kemne pabo public',
        'buying_price'=>'Taratari buying price de',
        'regular_price'=>'Public ki deikha kinbo tor matha ?',
        'qty'=>'Koita product ase hishab de age',
        'product_type'=>'Eida leikha dibo kera',
        'description'=>'Abar description dei nai ki koira khabi',
        'image.required'=>'Kire re vai image na dile public tor chehara deikha nibo product?',
        'image.max'=> 'Eto chuto size er image diso kno go 10 gb er ekta image de beshi valo hobe',
    ]);
        $product = new Product();
        $product -> name = $request->name;
        $product-> slug = Str::slug($request->name);
        $product ->sku_code = $request->sku_code ;
        $product ->cat_id = $request-> cat_id;
        $product ->subcat_id = $request-> subcat_id;
        $product -> regular_price= $request->regular_price ;
        $product ->discount_price = $request->discount_price ;
        $product -> buying_price= $request->buying_price ;
        $product ->qty = $request-> qty;
        $product -> product_type= $request-> product_type;
        $product ->description = $request-> description;
        $product ->product_policy = $request-> product_policy;
        if (isset($request->image)) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/Product', $imageName);

            $product->image = url('admin/Product/' . $imageName);
        }
        
        $product->save();
        

        //add colour.....
        
        if(is_array($request-> product_colour)&&$request->product_colour[0] !=null ){
            
            foreach ($request-> product_colour as $single_product_colour) {
                $colour = new color();
                $colour -> product_id = $product->id;
                $colour -> color_name = $single_product_colour;
                
                $colour->save();
            }
        }
        if(is_array($request-> product_size)&&$request->product_size[0] !=null ){
            
            foreach ($request-> product_size as $single_product_size) {
                $size = new size();
                $size -> product_id = $product->id;
                $size -> size_name = $single_product_size;
                
                $size->save();
                
            }
        }
        if(isset($request -> gallery_image)){
            foreach($request -> gallery_image as $single_gallery_image) {
                $image = new galaryimage();
                $image -> product_id = $product->id;
                $imagename = rand().'.'.$single_gallery_image->getClientOriginalExtension();
                $single_gallery_image -> move(('admin/galleryimage'), $imagename);
                $image -> imagename = url('admin/galleryimage/'.$imagename);
                $image -> save();
                
            }
            
        }
        toastr()->success('Product created successfully');
        return redirect()->back();


        
    }
    public function storehouse(){
        $products =  Product::orderBy('id','desc')->paginate(10);
        return view('admin.product.productstore' ,compact('products'));
    }
    public function changestatus($id){
        $product = Product::find($id);
        if($product->status == 'active'){
            $product->status = 'inactive';
            
        }
        else{
            $product->status = 'active';
        }
        $product->save();
        toastr()->success('status change succesfully');
        return redirect()->back();
        
    }
    public function storeedit($id){
        $product = Product::where('id',$id)->with('color','size','galaryimage')->first();
     
        $catagories = Category::orderby('name','asc')->get();
        $subcatagories = subcatagory::orderby('name','asc')->get();
      
        return view('admin.product.edit',compact('subcatagories','catagories','product'));
        
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
         $request->validate([
        'name'=> 'required|string|max:255',
        'sku_code'=> 'nullable|unique:products,sku_code,'.$id,
        'cat_id'=> 'required|integer',
        'subcat_id'=> 'nullable|integer',
        'buying_price'=> 'required',
        'regular_price'=> 'required',
        'qty'=> 'required',
        'product_type'=> 'required|string|max:255',
        'description'=> 'string',
        'image'=> 'image|max:2048',
    ],
    [
        'name.required'=> 'Name de age',
        'name.max'=> 'product er name to 10k word er hoy tui kom disos kn',
        'sku_code.unique'=>'Eki jinish koto jaigai dibar chash bujhi na',
        'cat_id.required'=> 'Catagory na dile product kemne pabo public',
        'buying_price'=>'Taratari buying price de',
        'regular_price'=>'Public ki deikha kinbo tor matha ?',
        'qty'=>'Koita product ase hishab de age',
        'product_type'=>'Eida leikha dibo kera',
        'description'=>'Abar description dei nai ki koira khabi',
        
        'image.max'=> 'Eto chuto size er image diso kno go 10 gb er ekta image de beshi valo hobe',
    ]);
    
        $product -> name = $request->name;
        $product-> slug = Str::slug($request->name);
        $product ->sku_code = $request->sku_code ;
        $product ->cat_id = $request-> cat_id;
        $product ->subcat_id = $request-> subcat_id;
        $product -> regular_price= $request->regular_price ;
        $product ->discount_price = $request->discount_price ;
        $product -> buying_price= $request->buying_price ;
        $product ->qty = $request-> qty;
        $product -> product_type= $request-> product_type;
        $product ->description = $request-> description;
        $product ->product_policy = $request-> product_policy;
        if (isset($request->image)) {
            if($product->image && file_exists('admin/Product/' .basename($product->image))){
                unlink('admin/Product/' .basename($product->image));
            }
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/Product', $imageName);

            $product->image = url('admin/Product/' . $imageName);
        }
        
        $product->save();
        

        //add colour.....
        
        if(is_array($request-> product_colour)&&$request->product_colour[0] !=null ){
            color::where('product_id',$id)->delete();
            foreach ($request-> product_colour as $single_product_colour) {
                $colour = new color();
                $colour -> product_id = $product->id;
                $colour -> color_name = $single_product_colour;
                
                $colour->save();
            }
        }
        if(is_array($request-> product_size)&&$request->product_size[0] !=null ){
            size::where('product_id',$id)->delete();
            foreach ($request-> product_size as $single_product_size) {
                $size = new size();
                $size -> product_id = $product->id;
                $size -> size_name = $single_product_size;
                
                $size->save();
                
            }
        }
        if(isset($request -> gallery_image)){
            $oldimages = galaryimage::where('product_id', $id)->get();
            foreach ($oldimages as $singleoldimage) {
                if($singleoldimage->imagename && file_exists('admin/galleryimage/' .basename($singleoldimage->imagename))){
                unlink('admin/galleryimage/' .basename($singleoldimage->imagename));
            }
            
            }
            galaryimage::where('product_id', $id)->delete();
            foreach($request -> gallery_image as $single_gallery_image) {
                $image = new galaryimage();
                $image -> product_id = $product->id;
                $imagename = rand().'.'.$single_gallery_image->getClientOriginalExtension();
                $single_gallery_image -> move(('admin/galleryimage'), $imagename);
                $image -> imagename = url('admin/galleryimage/'.$imagename);
                $image -> save();
                
            }
            
        }
        toastr()->success('Product created successfully');
        return redirect()->back();


    }
    public function storedelete($id){
        $product = Product::find($id);
        size::where('product_id', $id)->delete();
        color::where('product_id', $id)->delete();
        $oldimages = galaryimage::where('product_id', $id)->get();
            foreach ($oldimages as $singleoldimage) {
                if($singleoldimage->imagename && file_exists('admin/galleryimage/' .basename($singleoldimage->imagename))){
                unlink('admin/galleryimage/' .basename($singleoldimage->imagename));
            }
            
            }
            galaryimage::where('product_id', $id)->delete();

            if($product->image && file_exists('admin/Product/' .basename($product->image))){
                unlink('admin/Product/' .basename($product->image));
            }
            $product->delete();
            toastr()->success('product delete success');
            return redirect()->back();
            
    }
}
