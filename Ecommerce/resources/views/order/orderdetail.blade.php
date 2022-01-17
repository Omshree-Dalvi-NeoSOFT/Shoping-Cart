@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
            <div class="col-sm-2">
                        {{ __('Order Details') }}
                    </div>
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                        <a href="{{route('Orders')}}" class="btn btn-dark btn-sm" role="button">Back</a>
                    </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table" id="example1">  
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Specification</th>
                            <th scope="col">Order Details</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th class="text text-danger">Order Status</th>
                            <td>
                                
                                <form action="{{route('UpdateStatus')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$orderdetails->id}}" name="orderdtlid"/>
                                    <input type="hidden" value="{{$userdetails->id}}" name="userdtlid"/>
                                    <div class="row">
                                    <div class="col-md-8">
                                        <select class="form-control" id="category" name="status">
                                            <!-- foreach render types  -->                               
                                            <option value="{{$orderdetails->status}}" selected >{{$orderdetails->status}}</option>
                                            @if ($orderdetails->status == "Pending")
                                                <option value="Dispatched">Dispatched</option>
                                            @else
                                                <option value="Pending">Pending</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-info" value="Update Statu"/>
                                    </div>
                                    </div>
                                    
                                </form>
                                
                            </td>
                        </tr> 
                        <tr>
                            <th>1</th>
                            <th>Customer Name</th>
                            <td>{{$userdetails->firstname}} {{$userdetails->lastname}}</td>
                        </tr> 
                        <tr>
                            <th>2</th>
                            <th>Customer Email</th>
                            <td>{{$userdetails->email}}</td>
                        </tr> 
                        <tr>
                            <th>3</th>
                            <th>Customer Address</th>
                            <td>{{$userdetails->address1}} {{$userdetails->address2}}</td>
                        </tr> 
                        <tr>
                            <th>4</th>
                            <th>Customer Zip Code</th>
                            <th>{{$userdetails->zip}}</th>
                        </tr>
                        <tr>
                            <th>5</th>
                            <th>Customer Phone</th>
                            <td>{{$userdetails->phone}}</td>
                        </tr>
                        <tr>
                            <th>6</th>
                            <th>Customer Mobile</th>
                            <td>{{$userdetails->mobile}}</td>
                        </tr>
                        <tr>
                            <th>7</th>
                            <th>Shipping Instructions</th>
                            <td>{{$userdetails->shipping}}</td>
                        </tr>
                        <tr>
                            <th>8</th>
                            <th>Product Details</th>
                            <td>
                            <table class="table">
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                </tr>
                                
                                @foreach ($orders as $order)
                                    @foreach ($product as $prod)
                                        @if ($order->product_id == $prod->id)
                                        <tr>
                                            <td><img src="{{asset('/images/product/'.$prod->prod_mainimage)}}"  width=100 height=100/></td>
                                            <td>{{$prod->prod_name}}</td>
                                            <td>{{$prod->price}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>9</th>
                            <th>Order Total</th>
                            <td class="text text-danger">$ {{$orderdetails->grandtotal}}</td>
                        </tr>
                        <tr>
                            <th>10</th>
                            <th>Billing Amount (* including coupons)</th>
                            <td class="text text-success">$ {{$orderdetails->finalTotal}}</td>
                        </tr>
                        <tr>
                            <th>11</th>
                            <th>Coupon Name</th>
                            <th class="text text-primary">
                                @if ($coupons)
                                {{$coupons->code}}
                                @else
                                No Coupon applied ..
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>12</th>
                            <th>Coupon Value</th>
                            <th class="text text-primary">
                                @if ($coupons)
                                    {{$coupons->value}}
                                    @else
                                    No Coupon applied ..
                                @endif
                                
                            </th>
                        </tr>
                    </tbody>                
                </table>
                
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
