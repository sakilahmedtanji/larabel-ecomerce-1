<?php

namespace App\Models;
use App\Models\orderdetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function category (){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function subcatagory(){
        return $this->belongsTo(Subcatagory::class,'subcat_id','id');
    }
    public function color(){
        return $this->hasMany(color::class,'product_id','id');
    }
    public function size(){
        return $this->hasMany(size::class,'product_id','id');
    }
    public function galaryimage(){
        return $this->hasMany(galaryimage::class,'product_id','id');
    }
     public function review(){
        return $this->hasMany(review::class,'product_id','id');
    }
     public function carts(){
        return $this->hasMany(cart::class , 'product_id','id');
    }
    public function orderdetails(){
        return $this->hasMany(orderdetails::class , 'product_id','id');
    }
}
