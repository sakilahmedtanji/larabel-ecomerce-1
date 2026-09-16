<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ordercontroller extends Controller
{
  
     public function ordermanage(Request $request, $status){
        if(isset($request->search)){
    if($status == 'all'){
            $orders = order::where('invoice_number',$request->search)->orWhere('Phone','LIKE', '%' . $request->search . '%')->orderBy('id','desc')->with('orderdetails')->paginate(5);
    }else{
        $orders = order::where('invoice_number',$request->search)->orWhere('Phone','LIKE', '%' . $request->search . '%')->orderBy('id','desc')->with('orderdetails')->paginate(5);
    
    }}
    else{
        
    if($status == 'all'){
            $orders = order::orderBy('id','desc')->with('orderdetails')->paginate(5);
    }else{
        $orders = order::orderBy('id','desc')->with('orderdetails')->where('status', $status)->paginate(5);
    }
    }

    return view('admin.order.allorders', compact('orders','status'));
   }
   public function orderedit($id){
    $order = order::with('orderdetails')->where('id', $id)->first();
    
    return view('admin.order.orderedit', compact('order'));
   }
   public function orderupdate(Request $request , $id){
    $order = order::find($id);
    $order->phone = $request->phone;
    $order->adress = $request->adress;
    $order->charge = $request->charge;
    $order->curier = $request->curier;
   
    $order->save();
    return redirect()->back()->with('success', 'Order Updated Successfully');
   }
   public function orderproductupdate(Request $request , $id){
    $order = order::find($id);
    
    $order->price = $request->price;
    $order->color = $request->color;
    $order->size = $request->size;
    
    $order->save();
    return response()->json(['success' => 'Order Product Updated Successfully']);
   }
   public function curierupdate(Request $request , $order_id){
    $order = order::find($order_id);
    if($order->curier == 'Steadfast'){
        $endpoint = 'https://portal.packzy.com/api/v1/create_order';
        $header = [
            'Api-Key' => 'm0wllolurd9fiiobfvnxjjljsxbqzsts',
            'Secret-Key' => 'zdnihwownnqwnjrdrt5lchom',
            'Content-Type' => 'application/json',
        ];
        $invoicenumber = $order->invoice_number;
        $customername = $order->name;
        $customerphone = $order->phone;
        $customeraddress = $order->adress;
        $price = $order->price;
        $data =[
            'invoice'=>$invoicenumber,
            'recipient_name'=>$customername,
            'recipient_phone'=>$customerphone,
            'recipient_address'=>$customeraddress,
            'cod_amount'=>$price,
        ];
       $response= Http::withHeaders($header)->post($endpoint, $data);
        $java = $response->json();
        
        if(isset($java['consignment'])){
            $order->status = 'confirmed';
            $order->tracking = $java['consignment']['tracking_link'];
            $order->consignment_id = $java['consignment']['consignment_id'];
            $order->save();
        }

    }
    else{
        toastr()->error('Curier Not Found');
    }
    toastr()->success('Curier Updated Successfully');
    return redirect()->back();
   }
   public function statusupdate(Request $request , $id){
    $order = order::find($id);
    $order->status = $request->status;
    $order->save();
    return redirect()->back()->with('success', 'Order Status Updated Successfully');
   }
   public function curieradd(Request $request , $id){
    $order = order::find($id);
    $order->curier = $request->curier;
    $order->save();
    return redirect()->back()->with('success', 'Order Curier Updated Successfully');
   }
    public function orderdelete($id){
        $order = order::find($id);
        $order->delete();
        return redirect()->back()->with('success', 'Order Deleted Successfully');
    }
    public function bulkorderprint(Request $request){
        $orderid = order::wherein('id', $request->order_ids)->with('orderdetails')->get();
        
        return view('admin.order.bulkorderprint', compact('orderid'));
    }
}
