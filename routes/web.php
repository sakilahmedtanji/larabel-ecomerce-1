<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\catagorycontroller;
use App\Http\Controllers\customer\customercontroller;
use App\Http\Controllers\employee\employeecontroller;
use App\Http\Controllers\frontend\Homepagecontroller;
use App\Http\Controllers\frontend\logincontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\subcatagorycontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[Homepagecontroller::class,'index']);
Route::get('/product-details',[Homepagecontroller::class,('productdetails')]);
Route::get('/productshop',[Homepagecontroller::class,('shopproduct')]);
Route::get('/Privacy-policy',[Homepagecontroller::class,('Privacypolicy')]);
Route::get('/terms-condition',[Homepagecontroller::class,('termscondition')]);
Route::get('/refund-policy',[Homepagecontroller::class,('refundpolicy')]);
Route::get('/Payment-policy',[Homepagecontroller::class,('Paymentpolicy')]);
Route::get('/about-us',[Homepagecontroller::class,('aboutus')]);
Route::get('/contact-us',[Homepagecontroller::class,('contactus')]);
Route::get('/view-cart',[Homepagecontroller::class,('viewcart')]);
Route::get('/check-out',[Homepagecontroller::class,('checkout')]);
Route::get('/order-confirmation',[Homepagecontroller::class,('orderconfirmation')]);
Route::get('/catagory-products',[Homepagecontroller::class,('catagoryproducts')]);
Route::get('/subcatagory-products',[Homepagecontroller::class,('subcatagoryproducts')]);
Route::get('/type-products',[Homepagecontroller::class,('typeproducts')]);

Route::get('/admin/login',[logincontroller::class,'adminlogin']);
Route::post('/admin/loginauth',[logincontroller::class,'adminloginauth']);

Route::get('/employee/login',[logincontroller::class,'employeelogin']);
Route::post('/employee/loginauth',[logincontroller::class,'employeeloginauth']);

Route::get('/customer/login',[logincontroller::class,'customerlogin']);
Route::post('/customer/loginauth',[logincontroller::class,'customerloginauth']);
Route::get('/customer/register',[logincontroller::class,'customerregister']);
Route::post('/customer/register/store',[logincontroller::class,'customerregisterstore']);


Auth::routes(['login'=>false,'register'=>false]);

Route::middleware(['role:admin'])->group(function(){
    Route::get('/admin/dashboard',[admincontroller::class,'admindashboard']);
    Route::get('/admin/logout',[admincontroller::class ,'adminlogout']);
    
    //catagory controller 
    Route::get('/product/catagory-manage', [catagorycontroller::class,'productcatagory']);
    Route::post('/product/catagory-manage/post',[catagorycontroller::class,'store']);
    Route::get('/product/catagory-manage/post/store',[catagorycontroller::class,'storehouse']);
    Route::get('/product/catagory-manage/post/edit/{id}',[catagorycontroller::class,'storeedit']);
    Route::post('/product/catagory-manage/post/upate/{id}',[catagorycontroller::class,'update']);
    Route::get('/product/catagory-manage/post/delete/{id}',[catagorycontroller::class,'storedelete']);

    //subcatagory controller 
    Route::get('/product/subcatagory-manage', [subcatagorycontroller::class,'productcatagory']);
    Route::post('/product/subcatagory-manage/post',[subcatagorycontroller ::class,'store']);
    Route::get('/product/subcatagory-manage/post/store',[subcatagorycontroller ::class,'storehouse']);
    Route::get('/product/subcatagory-manage/post/edit/{id}',[subcatagorycontroller ::class,'storeedit']);
    Route::post('/product/subcatagory-manage/post/upate/{id}',[subcatagorycontroller ::class,'update']);
    Route::get('/product/subcatagory-manage/post/delete/{id}',[subcatagorycontroller ::class,'storedelete']);

     //product controller 
    Route::get('/product/product-add', [productcontroller::class,'create']);
    Route::post('/product/product-manage/post',[productcontroller ::class,'store']);
    Route::get('/product/product-manage/post/store',[productcontroller ::class,'storehouse']);
    Route::get('/product/product-manage/post/edit/{id}',[productcontroller ::class,'storeedit']);
    Route::post('/product/product-manage/post/upate/{id}',[productcontroller ::class,'update']);
    Route::get('/product/product-manage/post/delete/{id}',[productcontroller ::class,'storedelete']);
    

});

Route::middleware(['role:employee'])->group(function(){
    Route::get('/employee/dashboard',[employeecontroller::class,'employeedashboard']);
    Route::get('/employee/logout',[employeecontroller::class ,'employeelogout']);
});

Route::middleware(['role:customer'])->group(function(){
    Route::get('/customer/dashboard',[customercontroller::class,'customerdashboard']);
    Route::get('/customer/logout',[customercontroller::class,'customerlogout']);
    Route::get('/customer/profile-view',[customercontroller::class,'profileview']);
    Route::post('/customer/profile-update',[customercontroller::class,'profileupdate']);
});

