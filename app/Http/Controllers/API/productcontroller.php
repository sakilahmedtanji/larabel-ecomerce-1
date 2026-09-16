<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use \App\Models\Product;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function Products(){
        try{
            
            $products = Product::where('status', 'active ')->orderBy('name', 'asc')->paginate(10);

            if ($products->isEmpty()) {
                return response()->json([
                    'error' => true,
                    'message' => 'No products found',
                    'products' => []
                ], 404);
            }

            return response()->json([
                'error' => false,
                'products' => $products,
                'message' => 'Products fetched successfully'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                'products' => [],
                // 'error_message' => $e->getMessage()
            ], 500);
        }
    }
    public function ProductDetails($slug){
        try{
            $productdetails = Product::with('color','size','review','galaryimage')->where('slug',$slug)->first();

            if (!$productdetails) {
                return response()->json([
                    'error' => true,
                    'message' => 'Product not found',
                    'productdetails' => []
                ], 404);
            }

            return response()->json([
                'error' => false,
                'productdetails' => $productdetails,
                'message' => 'Product details fetched successfully'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                'productdetails' => [],
                // 'error_message' => $e->getMessage()
            ], 500);
        }
    }
    public function typeproducts($type){
        try{
            $Hotproduct = Product::where('product_type','Hot')->where('status', 'active')->orderBy('name', 'asc')->get();
            $Discountproduct = Product::where('product_type','Discount')->where('status', 'active')->orderBy('name', 'asc')->get();
            $Newproduct = Product::where('product_type','New')->where('status', 'active')->orderBy('name', 'asc')->get();
            $Regularproduct = Product::where('product_type','Regular')->where('status', 'active')->orderBy('name', 'asc')->get();

            if ($Hotproduct->isEmpty() && $Discountproduct->isEmpty() && $Newproduct->isEmpty() && $Regularproduct->isEmpty()) {
                return response()->json([
                    'error' => true,
                    'message' => 'No products found for this type',
                    'typeproducts' => []
                ], 404);
            }
             
            $productsByType = [
                'Hot' => $Hotproduct,
                'Discount' => $Discountproduct,
                'New' => $Newproduct,
                'Regular' => $Regularproduct,
            ];

            return response()->json([
                'error' => false,
                'typeproducts' => $productsByType,
                'message' => 'Products fetched successfully for this type'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                'typeproducts' => [],
                // 'error_message' => $e->getMessage()
            ], 500);
        }
    }
    public function categoryproducts($id){
        try{
            $categoryproducts = Product::where('cat_id',$id)->where('status', 'active')->orderBy('name', 'desc')->get();

            if ($categoryproducts->isEmpty()) {
                return response()->json([
                    'error' => true,
                    'message' => 'No products found for this category',
                    'categoryproducts' => []
                ], 404);
            }

            return response()->json([
                'error' => false,
                'categoryproducts' => $categoryproducts,
                'message' => 'Products fetched successfully for this category'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                'categoryproducts' => [],
                // 'error_message' => $e->getMessage()
            ], 500);
        }
    }
     public function subcategoryproducts($id){
        try{
            $subcategoryproducts = Product::where('subcat_id',$id)->where('status', 'active')->orderBy('name', 'desc')->get();

            if ($subcategoryproducts->isEmpty()) {
                return response()->json([
                    'error' => true,
                    'message' => 'No products found for this subcategory',
                    'subcategoryproducts' => []
                ], 404);
            }

            return response()->json([
                'error' => false,
                'subcategoryproducts' => $subcategoryproducts,
                'message' => 'Products fetched successfully for this subcategory'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'error' => true,
                'message' => 'Something went wrong',
                'subcategoryproducts' => [],
                'error_message' => $e->getMessage()
            ], 500);
        }
    }
}
