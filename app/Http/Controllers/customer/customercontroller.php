<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class customercontroller extends Controller
{
    public function customerdashboard()
    {
        $allorders = order::where('user_id', Auth::user()->id)->count();
        $pendingorders = order::where('user_id', Auth::user()->id)
            ->where('status', 'pending')
            ->count();
        $confirmedorders = order::where('user_id', Auth::user()->id)
            ->where('status', 'confirmed')
            ->count();
        $deliveredorders = order::where('user_id', Auth::user()->id)
            ->where('status', 'delivered')
            ->count();
        $canceledorders = order::where('user_id', Auth::user()->id)
            ->where('status', 'canceled')
            ->count();
        $returnorders = order::where('user_id', Auth::user()->id)
            ->where('status', 'return')
            ->count();
        return view('customer.customer-dashboard', compact('allorders', 'pendingorders', 'confirmedorders', 'deliveredorders', 'canceledorders', 'returnorders'));
    }

    public function customerlogout()
    {
        Auth::logout();

        return redirect('/customer/login');
    }

    public function profileview()
    {
        $authuserid = Auth::user();

        return view('customer.customerview', compact('authuserid'));
    }

    public function profileupdate(Request $request)
    {
        $authuserid = Auth::user()->id;
        $authuser = User::find($authuserid);

        $authuser->name = $request->name;
        $authuser->email = $request->email;
        $authuser->phone = $request->phone;

        if (isset($request->image)) {

            if (
                $authuser->image &&
                file_exists('customer/Image/' . basename($authuser->image))
            ) {
                unlink('customer/Image/' . basename($authuser->image));
            }

            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();

            $image->move('customer/Image', $imageName);

            $authuser->image = url('customer/Image/' . $imageName);
        }

        $authuser->save();

        return redirect()->back();
    }

    public function cradential()
    {
        $authuser = Auth::user();

        return view('customer.customerc', compact('authuser'));
    }

    public function cradentialupdate(Request $request)
    {
        $authuserid = Auth::user()->id;
        $authuser = User::find($authuserid);

        if (isset($request->email)) {
            $authuser->email = $request->email;
        }

        if (isset($request->old_password) && ($request->password)) {

            if (Hash::check($request->old_password, $authuser->password)) {

                $authuser->password = Hash::make($request->password);

            } else {

                return redirect()->back();
            }
        }

        $authuser->save();

        Auth::logout();

        return redirect()->back();
    }

    public function customerorder($status)
    {
        if ($status == 'all') {

            $orders = order::with('orderdetails.product')
                ->where('user_id', Auth::user()->id)
                ->get();

        } else {

            $orders = order::with('orderdetails.product')
                ->where('user_id', Auth::user()->id)
                ->where('status', $status)
                ->get();
        }

        return view('customer.orders.allorder', compact('orders'));
    }
    public function ordercancel($id)
    {
        $order = order::find($id);
        $order->status = 'canceled';
        $order->save();

        return redirect()->back();
    }
}