<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Mail\OrderUpdateMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // display all orders
    public function Orders(){
        $orders = Order::all();
        $userdetails = UserDetails::all();
        $orderdetails = OrderDetails::all();
        $coupons = Coupon::all();
        return view('order.vieworder',compact('orders','userdetails','orderdetails','coupons'));
    }

    // display order in detail
    public function OrdersDetail($id){
        $userdetails = UserDetails::where('id',$id)->first();
        $orderdetails = OrderDetails::where('userdetail_id',$id)->first();
        $orders = Order::where('userdetail_id',$id)->get();
        $coupons = Coupon::where('id',$orderdetails->coupon_id)->first();
        $product = Product::all();
        $productimages = ProductImage::all();
        return view('order.orderdetail',compact('userdetails','orderdetails','orders','coupons','product','productimages'));
    }

    // update status
    public function UpdateStatus(Request $req){
        OrderDetails::where('id',$req->orderdtlid)->update([
            'status' => $req->status
        ]);
        $userdetails = UserDetails::where('id',$req->userdtlid)->first();
        $uemail = User::where('id',$userdetails->user_id)->get('email');
        $orderdetails = OrderDetails::where('id',$req->orderdtlid)->first();
        $data = ['email'=>$userdetails->email,'status'=>$orderdetails->status];
        Mail::to($uemail)->send(new OrderUpdateMail($data));

        return back()->with('status',"Order Updated !! Mail Send to User");
    }
}
