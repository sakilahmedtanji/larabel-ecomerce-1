<?php

namespace App\Models;
use App\Models\orderdetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orderdetails(){
        return $this->hasMany(orderdetails::class , 'order_id','id')->with('product');
    }
}
