<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\customer\customercontroller;
use App\Http\Controllers\employee\employeecontroller;
use App\Http\Controllers\frontend\Homepagecontroller;
use App\Http\Controllers\frontend\logincontroller;
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


Auth::routes(['login'=>false,'register'=>false]);

Route::middleware(['role:admin'])->group(function(){
    Route::get('/admin/dashboard',[admincontroller::class,'admindashboard']);
    Route::get('/admin/logout',[admincontroller::class ,'adminlogout']);
});

Route::middleware(['role:employee'])->group(function(){
    Route::get('/employee/dashboard',[employeecontroller::class,'employeedashboard']);
    Route::get('/employee/logout',[employeecontroller::class ,'employeelogout']);
});



