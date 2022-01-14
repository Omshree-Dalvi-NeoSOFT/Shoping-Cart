@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Edit Product') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{route('UpdateProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="id"/>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-3">
                            <label for="prodname" class="col-md-3 col-form-label text-md-end">{{ __('Product Name') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="prodname" type="text" class="form-control @error('prodname') is-invalid @enderror" name="prodname" value="{{ $product->prod_name }}"  autocomplete="prodname" autofocus>

                                @error('prodname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="subcat" class="col-md-3 col-form-label text-md-end">{{ __(' Sub-Category Type ') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <select class="form-control @error('subcat') is-invalid @enderror" id="subcat" name="subcat">
                                    <!-- foreach render types  -->
                                    <option value="{{$product->subcat_id}}">{{$subcat->subcat_name}} </option>
                                @foreach ($subcategories as $type)
                                    <option value="{{$type->id}}">{{$type->subcat_name}}</option>
                                @endforeach
                                </select>
                                @error('subcat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="prodcolour" class="col-md-3 col-form-label text-md-end">{{ __('Product Colour') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="prodcolour" type="text" class="form-control @error('prodcolour') is-invalid @enderror" name="prodcolour" value="{{ $product->colour }}"  autocomplete="prodcolour" autofocus>

                                @error('prodcolour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="prodquant" class="col-md-3 col-form-label text-md-end">{{ __('Product Quantity') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="prodquant" type="text" class="form-control @error('prodquant') is-invalid @enderror" name="prodquant" value="{{ $product->quantity }}"  autocomplete="prodquant" autofocus>

                                @error('prodquant')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="prodprice" class="col-md-3 col-form-label text-md-end">{{ __('Product Price') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="prodprics" type="text" class="form-control @error('prodprics') is-invalid @enderror" name="prodprics" value="{{ $product->price }}"  autocomplete="prodprics" autofocus>

                                @error('prodprics')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="proddescription" class="col-md-3 form-label text-md-end">{{ __('Product Description ') }} <i class="text text-danger">( optional )</i></label>
                            <div class="col-md-8">
                                <textarea class="form-control @error('proddescription') is-invalid @enderror" id="proddescription" name="proddescription" value="{{ old('proddescription') }}" rows="4">{{$product->prod_description}}</textarea>
                                @error('proddescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                        <label class="col-md-3 form-label text-md-end">{{ __('Product Attributes ') }} <i class="text text-danger">( optional )</i></label><br>
                        <button type="button" name="add" id="add-btn" class="btn btn-success mb-3">Add More</button>
                        <table class="table table-bordered">
                            <tr>
                                <th>Attribute Name</th>
                                <th>Attribute Value</th>
                                <th>Action</th>
                            </tr>
                            <tr> 
                                @foreach ($productAssocs as $assocs)
                                <td><input type="text" class="form-control" value="{{$assocs->attr_name}}"/></td> 
                                <td><input type="text" class="form-control" value="{{$assocs->arrt_value}}"/></td>
                                <td><button type="button"  class="btn btn-danger remove-tr dtlattr" atrid="{{$assocs->id}}">Remove</button></td>                          
                                <tr>
                                @endforeach 
                                
                            </tr>
                        </table>
                        <table class="table table-bordered" id="dynamicAddRemove">    
                        </table>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="col-md-3 form-label text-md-end">{{ __('Main Product Image')}} <i class="text text-danger">*</i></label>
                            <input type="file" name="imgmain" class="form-control file-upload-info @error('imgmain') is-invalid @enderror" multiple>
                            @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="col-md-3 form-label text-md-end">{{ __('Product Other Image')}} <i class="text text-danger">*</i></label>
                            <input type="file" name="img[]" class="form-control file-upload-info @error('img') is-invalid @enderror" multiple >
                            @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <table class="table table-bordered mt-3" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                        <td><img src="{{asset('/images/product/'.$product->prod_mainimage)}}"  width=100 height=100/></td>
                                                <td>Main Image</td>
                                            </tr>
                                        </tr>
                                        @foreach ($productImages as $prodimg)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img src="{{asset('/images/product/'.$prodimg->prodimg)}}"  width=100 height=100/></td>
                                                <td><a type="button" class="btn btn-danger btn-sm dtlban" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aid="{{$prodimg->id}}">
                                                Delete</a>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Product') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
var i = 0;
var j = 0;
$("#add-btn").click(function(){
++i;
++j;
$("#dynamicAddRemove").append('<tr><td><input type="text" name="attr['+i+'][name]" placeholder="Enter Name" class="form-control @error(`attr.*.name`) is-invalid @enderror" /></td><td><input type="text" name="attr['+j+'][value]" placeholder="Enter Value" class="form-control @error(`attr.*.value`) is-invalid @enderror" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});
$(document).ready(function(){
    $(".dtlban").click(function(e){
        var aid = $(this).attr("aid");
        if(confirm("Do you want to delete ?")){
            $.ajax({
                url:"{{url('/deleteprodimage')}}",
                type:'post',
                method:'patch',
                data:{_token:'{{csrf_token()}}',aid:aid},
                success:function(response){
                    window.location.reload();
                },
                error: function(jqXHR, status, err){
                    window.location.reload();
                }
            }) 
        }
    })
});
$(document).ready(function(){
    $(".dtlattr").click(function(e){
        var atrid = $(this).attr("atrid");
        if(confirm("Do you want to delete ?")){
            $.ajax({
                url:"{{url('/deleteattr')}}",
                type:'post',
                method:'patch',
                data:{_token:'{{csrf_token()}}',atrid:atrid},
                success:function(response){
                    window.location.reload();
                },
                error: function(jqXHR, status, err){
                    window.location.reload();
                }
            }) 
        }
    })
})
</script>
@endsection
