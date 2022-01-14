@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
            <div class="col-sm-2">
                        {{ __('Product Details') }}
                    </div>
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                        <a href="{{route('ShowProduct')}}" class="btn btn-dark btn-sm" role="button">Back</a>
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
                            <th scope="col">Product Specification</th>
                            <th scope="col">Product Details</th>
                        </tr>
                    </thead> 
                    <tbody>  
                        <tr>
                            <th>1</th>
                            <th>Product Name</th>
                            <td>{{$product->prod_name}}</td>
                        </tr> 
                        <tr>
                            <th>2</th>
                            <th>Product Category</th>
                            <td>{{$catid->cat_name}} &nbsp; <b>>></b> &nbsp; {{$subcat->subcat_name}}</td>
                        </tr> 
                        <tr>
                            <th>3</th>
                            <th>Product Quantity</th>
                            <td>{{$product->quantity}}</td>
                        </tr> 
                        <tr>
                            <th>4</th>
                            <th>Product Price</th>
                            <th class="text-danger">{{$product->price}} $</th>
                        </tr>
                        <tr>
                            <th>5</th>
                            <th>Product Colour</th>
                            <td>{{$product->colour}}</td>
                        </tr>
                        <tr>
                            <th>6</th>
                            <th>Product Main Image</th>
                            <td>
                                <img src="{{asset('/images/product/'.$product->prod_mainimage)}}"  width=100 height=100/>
                            </td>
                        </tr>
                        <tr>
                            <th>7</th>
                            <th>Product Images</th>
                            <td>
                                @foreach ($productImages as $image)
                                <img src="{{asset('/images/product/'.$image->prodimg)}}"  width=100 height=100/>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>8</th>
                            <th>Product Attributes</th>
                            <td>
                            <table class="table">
                                <tr>
                                    <th>Attribute Name</th>
                                    <th>Attribute Value</th>
                                </tr>
                                @foreach ($productAssocs as $assocs)
                                        <tr>
                                            <td>{{$assocs->attr_name}}</td>
                                            <td>{{$assocs->arrt_value}}</td>
                                        </tr>
                                @endforeach
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>9</th>
                            <th>Product Description</th>
                            <td>{{$product->prod_description}}</td>
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
