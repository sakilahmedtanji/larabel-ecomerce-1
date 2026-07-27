<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Category;
use App\Models\contactmassage;
use App\Models\order;
use App\Models\orderdetails;
use App\Models\policysettings;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  Homepagecontroller extends Controller
{
    public function index(){
        $hotproducts = Product::where('status','active')->where('product_type', 'hot')->paginate(10);
        // dd($hotproducts);
        $newproducts = Product::where('status','active')->where('product_type', 'new')->paginate(10);
        $discountproducts = Product::where('status','active')->where('product_type', 'discount')->paginate(10);
        $regularproducts = Product::where('status','active')->where('product_type', 'regular')->paginate(10);
        $category = Category::get();
        
        return view('Frontend.Dashboard',compact('hotproducts','discountproducts','newproducts','regularproducts','category'));
    }
    public function productdetails($slug){
        $product = product::with('color','size','galaryimage','review')->where('slug',$slug)->first();
        
       
        $detailscategory = Category::get();
        
        return view('frontend.productdetails',compact('product','detailscategory'));
        
    }
    public function addcart(request $request ,$id){
        $product = Product::find( $id );
        $addcart = cart::where('product_id',$product->id)->where('ip_adress',$request->ip())->first();
        if($addcart == null){
            $cart = new cart();
        $cart->product_id = $product->id;
        $cart->size = $request->size;
        $cart->color = $request->color;
        $cart->qty = $request-> qty;
        if($product->discount_price != null){
            $cart->price = $product->discount_price;
        }
        else{
            $cart->price = $product->regular_price;
        }
        $cart->ip_adress = $request->ip();
        if(Auth::check()){
            $cart->user_id = Auth::user()->id;
        }
        $cart->save();
        }
        elseif($addcart != null){
            
        $addcart->size = $request->size;
        $addcart->color = $request->color;
        $addcart->qty = $request-> qty;

        if($product->discount_price != null){
            $addcart->price = $product->discount_price;
        }
        else{
            $addcart->price = $product->regular_price;
        }
        
        $addcart->save();
        }
        
         toastr()->success('Product Cart successfully');
        if($request->action == 'buyNow'){
            return redirect('/check-out');
            
        }
        else{
            return redirect()->back();
        }
       

    }

    public function addcartshome(request $request, $id){
        $product = Product::find( $id );
        $addcart = cart::where('product_id',$product->id)->where('ip_adress',$request->ip())->first();
        if($addcart == null){
            $cart = new cart();
        $cart->product_id = $product->id;

        $cart->qty = 1;
        if($product->discount_price != null){
            $cart->price = $product->discount_price;
        }
        else{
            $cart->price = $product->regular_price;
        }
        $cart->ip_adress = $request->ip();
        if(Auth::check()){
            $cart->user_id = Auth::user()->id;
        }
        $cart->save();
        }
        elseif($addcart != null){
            
  
        $addcart->qty = 1;

        if($product->discount_price != null){
            $addcart->price = $product->discount_price;
        }
        else{
            $addcart->price = $product->regular_price;
        }
        
        $addcart->save();
        }
        
         toastr()->success('Product Cart successfully');
        if($request->action == 'buyNow'){
            return redirect('/check-out');
            
        }
        else{
            return redirect()->back();
        }
    }
    public function order(Request $request){
        $order = new order();
        
        $order->ip_adress =  $request->ip();
        $order->user_id = auth()->check()? Auth()->user()->id : null;
        $previousorder = order::orderBy('id','desc')->first();
        if($previousorder == null){
            $generated = 'XYZ-1';
            $order->invoice_number = $generated;
        }
        elseif($previousorder != null){
            $generated = 'XYZ-'.($previousorder->id+1);
            $order->invoice_number = $generated;
        }
        
         $order->phone= $request->phone;
        $order->name = $request->name ;
        $order->charge = $request->charge ;
        $order->adress = $request->adress ;
        $order->price = $request->grandTotal ;

        $cartproduct = cart::where('ip_adress',$request->ip())->get();
        if($cartproduct->isNotEmpty()){
            $order->save();
            foreach($cartproduct as $cart){
                $orderdetails = new orderdetails();
                $orderdetails->order_id= $order->id;
                $orderdetails->product_id = $cart->product_id;
                $orderdetails->color= $cart->color;
                $orderdetails->price = $cart->price ;
                $orderdetails->save();
                $cart->delete();
            }
            
            return redirect('/order-confirmation/'.$generated);
            
        }
        else{
            toastr()->error('Your Cart is Empty');
            return redirect('/');
        }
        

    }
    public function orderconfirmation($invoice_number){
        return view('frontend.confirmation', compact('invoice_number'));
    }
   
    public function shopproduct(){
        return view('frontend.shop');
    }
    public function Privacypolicy(){
        $privacy = policysettings::select('privacy_policy')->first();
        return view('frontend.privacypolicy',compact('privacy'));
    }
    public function termscondition(){
        $terms = policysettings::select('terms_conditions')->first();
        return view('frontend.terms',compact('terms'));
    }
    public function refundpolicy(){
        $refund = policysettings::select('refund_policy')->first();
        return view('frontend.refund',compact('refund'));
    }
    public function Paymentpolicy(){
        $payment = policysettings::select('payment_plicy')->first();
        return view('frontend.payment',compact('payment'));
    }
    public function aboutus(){
        $about = policysettings::select('about_us')->first();
        return view('frontend.about',compact('about'));
    }
     public function contactus(){
        $contact = new contactmassage();
        return view('frontend.contact');
    }
    public function contact(Request $request){
        $contact = new contactmassage();
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required',
           
            'subject'=> 'required',
            'massage'=> 'required',
        ],
        [
            'name.required'=> 'Kindly enter Your name',
            'email.required'=>'kindly enter your email',
            'subject.required'=>'Kindly input your subject',
            'massage.required'=>'Kindly enter your massage',
        ]);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->massage = $request->massage;
        $contact->save();
        toastr()->success('Massage sent succesfully');
        return redirect()->back();
        
    }
    public function deletecart($id){
        $delcart = cart::find($id);
        $delcart->delete();
        return redirect()->back();
    }
    public function viewcart(){
        return view('frontend.cart');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    
    public function catagoryproducts(){
        return view('frontend.catagory');
    }
    public function subcatagoryproducts(){
        return view('frontend.subcatagory');
    }
    public function typeproducts(){
        return view('frontend.typeproduct');
    }
}
