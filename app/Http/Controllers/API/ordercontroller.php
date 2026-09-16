<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ordercontroller extends Controller
{
    //


    public function addtocart(Request $request, $id)
    {
        try {

            $product = Product::find($id);
            $addcart = cart::where('product_id', $product->id)->where('ip_adress', $request->ip())->first();
            if ($addcart == null) {
                $cart = new cart();
                $cart->product_id = $product->id;
                $cart->color = $request->color;
                $cart->size = $request->size;
                $cart->qty = $request->qty ?? 1; // Default to 1 if qty is not provided

                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price;
                } else {
                    $cart->price = $product->regular_price;
                }
                $cart->ip_adress = $request->ip();
                if (Auth::check()) {
                    $cart->user_id = Auth::user()->id;
                }
                $cart->save();
            } 
            
            elseif ($addcart != null) {


                $addcart->qty = $request->qty ?? 1; // Default to 1 if qty is not provided
                $addcart->color = $request->color;
                $addcart->size = $request->size;

                if ($product->discount_price != null) {
                    $addcart->price = $product->discount_price;
                } else {
                    $addcart->price = $product->regular_price;
                }

                $addcart->save();
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                // 'error_message' => $e->getMessage()
            ], 500);
        }
    }
}
