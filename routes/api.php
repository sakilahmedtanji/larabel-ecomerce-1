<?php

use App\Http\Controllers\API\Generalsettingscontroller;
use App\Http\Controllers\API\ordercontroller;
use App\Http\Controllers\API\productcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/generalsettings', [Generalsettingscontroller::class, 'Generalsettings']);
Route::get('/categories', [Generalsettingscontroller::class, 'Categories']);
Route::get('/subcategories', [Generalsettingscontroller::class, 'Subcategories']);

//products
Route::get('/products', [productcontroller::class, 'Products']);
Route::get('/productdetails/{slug}', [productcontroller::class, 'ProductDetails']);
Route::get('/type-product/{type}', [productcontroller::class, 'typeproducts']);
Route::get('/category-product/{id}',[productcontroller::class, 'categoryproducts']);
Route::get('/subcategory-product/{id}',[productcontroller::class, 'subcategoryproducts']);

//order
Route::get('/add-to-cart/{id}', [ordercontroller::class, 'addtocart']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
