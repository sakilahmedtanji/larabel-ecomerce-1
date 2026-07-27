<?php

use App\Http\Controllers\admin\settingscontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\catagorycontroller;
use App\Http\Controllers\customer\customercontroller;
use App\Http\Controllers\customermassagecontroller;
use App\Http\Controllers\employee\employeecontroller;
use App\Http\Controllers\frontend\Homepagecontroller;
use App\Http\Controllers\frontend\logincontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\reviewcontroller;
use App\Http\Controllers\subcatagorycontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[Homepagecontroller::class,'index']);
Route::get('/product-details/{slug}',[Homepagecontroller::class,('productdetails')]);
Route::get('/productshop',[Homepagecontroller::class,('shopproduct')]);
Route::get('/Privacy-policy',[Homepagecontroller::class,('Privacypolicy')]);
Route::get('/terms-condition',[Homepagecontroller::class,('termscondition')]);
Route::get('/refund-policy',[Homepagecontroller::class,('refundpolicy')]);
Route::get('/Payment-policy',[Homepagecontroller::class,('Paymentpolicy')]);
Route::get('/about-us',[Homepagecontroller::class,('aboutus')]);
Route::get('/contact-us',[Homepagecontroller::class,('contactus')]);
Route::post('/contact/massage',[Homepagecontroller::class,('contact')]);
Route::get('/view-cart',[Homepagecontroller::class,('viewcart')]);
Route::get('/check-out',[Homepagecontroller::class,('checkout')]);
Route::get('/order-confirmation/{invoice_id}',[Homepagecontroller::class,('orderconfirmation')]);
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

Route::post('/add-to-cart/{id}',[Homepagecontroller::class,('addcart')]);
Route::get('/add-cart/{id}',[Homepagecontroller::class,('addcartshome')]);
Route::get('/Delete-cart/{id}',[Homepagecontroller::class,('deletecart')]);

Route::post('/order/confirm/',[Homepagecontroller::class,'order']);




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
    Route::get('/product/status-change/{id}',[productcontroller ::class,'changestatus']);
    

});
Route::middleware(['role:admin,employee'])->group(function(){
    //website settings
    Route::get('/website-settings',[settingscontroller::class,'websitesettings']);
    Route::post('/update/website-settings',[settingscontroller::class,'updatesetting']);


    //policy settings
    Route::get('/Policy-settings',[settingscontroller::class ,'policysettings']);
    Route::post('/Policy-settings/update',[settingscontroller::class ,'policysettingsupdate']);

    //customermassage

    Route::get('/customer-massage',[customermassagecontroller::class,'customermassage']);
    Route::get('/customer-massage/show/{id}',[customermassagecontroller::class,'massageshow']);
    Route::get('/customer-massage/delete/{id}',[customermassagecontroller::class,'massagedelete']);
    
    // customer review
    Route::get('/review-add',[reviewcontroller::class,'reviewadd']);
    Route::post('/review/store',[reviewcontroller::class,'reviewstore']);
     Route::get('/review/storage',[reviewcontroller::class,'reviewstorage']);
    Route::get('/review/edit/{id}',[reviewcontroller::class,'reviewedit']);
    Route::post('/review-update/{id}',[reviewcontroller::class,'reviewupdate']);
    Route::get('/customer-review/delete/{id}',[reviewcontroller::class,'massagedelete']);
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
    Route::get('/customer/cradential',[customercontroller::class,'cradential']);
    Route::post('/customer/cradentialupdate',[customercontroller::class,'cradentialupdate']);
});

