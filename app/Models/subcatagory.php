<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcatagory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function catagory(){
        return $this->belongsTo(category::class,'cat_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'subcat_id','id');
    }
}
