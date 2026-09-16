<?php

namespace App\Models;
use App\Models\order;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    use HasFactory;
    protected $guarded = [];
     public function order (){
        return $this->belongsTo(order::class,'order_id','id');
    }
    public function product (){
        return $this->belongsTo(product::class,'product_id','id');
    }
}
