<?php

namespace App\Http\Controllers;

use App\Models\contactmassage;
use Illuminate\Http\Request;

class customermassagecontroller extends Controller
{
    public function customermassage(){
        $massages = contactmassage::orderBy("id","desc")->paginate(10);
        return view('admin.customermassage',compact('massages'));
    }
    public function massageshow($id){
        $massageshow = contactmassage::find($id);
        return view('admin.massageshow',compact('massageshow'));
    }
    public function massagedelete($id){
        $massagedel = contactmassage::find($id);
        $massagedel->delete();
        toastr()->success('Massage Delete successfull');
        return redirect('/customer-massage');
    }
}
