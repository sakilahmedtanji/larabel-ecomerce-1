<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\review;
use Illuminate\Http\Request;

class reviewcontroller extends Controller
{
    public function reviewadd(){
        $reviews = Product::orderby('name','asc')->get();
        return view("admin.review.review",compact("reviews"));
    }
    public function reviewstore(Request $request){
        $review = new review();
        $review->product_id = $request->product_id;
        $review->customer_name = $request->customer_name;
        $review->comment = $request->comment ;
        $review->ratting = $request->ratting ;
         if (isset($request->image)) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/review', $imageName);

            $review->image = url('admin/review/' . $imageName);
        }
        $review->save();
        toastr()->success('review add successfully');
        return redirect('/review/storage');
        
        }
        public function reviewstorage(){
            $reviews = review::orderby('id','desc')->get();
            return view('admin.review.reviewstorage',compact('reviews'));
        }
        public function reviewedit($id){
            $products = product::orderBy('name','asc')->get();
            $reviews = review::find( $id );
            
            return view('admin.review.reviewedit',compact('products','reviews'));
        }


        public function reviewupdate(Request $request, $id){
            $review = review::find($id);
            $review->product_id = $request->product_id;
            $review->customer_name = $request->customer_name;
            $review->comment = $request->comment ;
            $review->ratting = $request->ratting ;

            if (isset($request->image)) {
            if($review->image && file_exists('admin/review' .basename($review->image))){
                unlink('admin/review' .basename($review->image));
            }
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('admin/catagory', $imageName);

            $review->image = url('admin/catagory/' . $imageName);
            
        }
        $review->save();
             toastr()->success('Review change success');
            return redirect('/review/storage');
            
        }
        public function massagedelete($id){
            $review = Review::find($id);
            $review->delete();
            toastr()->success('Review Delete successfull');
            return redirect()->back();
            
        }
        
}
