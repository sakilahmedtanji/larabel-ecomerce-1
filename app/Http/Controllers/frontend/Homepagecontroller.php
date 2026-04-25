<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homepagecontroller extends Controller
{
    public function index(){
        return view('Frontend.Dashboard');
    }
    public function productdetails(){
        return view('frontend.productdetails');
    }
    public function shopproduct(){
        return view('frontend.shop');
    }
    public function Privacypolicy(){
        return view('frontend.privacypolicy');
    }
    public function termscondition(){
        return view('frontend.terms');
    }
    public function refundpolicy(){
        return view('frontend.refund');
    }
    public function Paymentpolicy(){
        return view('frontend.payment');
    }
    public function aboutus(){
        return view('frontend.about');
    }
     public function contactus(){
        return view('frontend.contact');
    }
    public function viewcart(){
        return view('frontend.cart');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function orderconfirmation(){
        return view('frontend.confirmation');
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
