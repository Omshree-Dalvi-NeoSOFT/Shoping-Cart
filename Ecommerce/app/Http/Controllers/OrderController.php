<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Orders(){
        $orders = Order::all();
        $userdetails = UserDetails::all();
        $orderdetails = OrderDetails::all();
        $coupons = Coupon::all();
        return view('order.vieworder',compact('orders','userdetails','orderdetails','coupons'));
    }

    public function OrdersDetail($id){
        $userdetails = UserDetails::where('id',$id)->first();
        $orderdetails = OrderDetails::where('userdetail_id',$id)->first();
        $orders = Order::where('userdetail_id',$id)->get();
        $coupons = Coupon::where('id',$orderdetails->coupon_id)->first();
        $product = Product::all();
        $productimages = ProductImage::all();
        return view('order.orderdetail',compact('userdetails','orderdetails','orders','coupons','product','productimages'));
    }
}
