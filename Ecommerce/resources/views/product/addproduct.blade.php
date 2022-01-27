@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Add Product') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{route('PostAddProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-3">
                            <label for="prodname" class="col-md-3 col-form-label text-md-end">{{ __('Product Name') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="prodname" type="text" class="form-control @error('prodname') is-invalid @enderror" name="prodname" value="{{ old('prodname') }}"  autocomplete="prodname" autofocus>

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
                                    <option default>Select ..... </option>
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
                                <input id="prodcolour" type="text" class="form-control @error('prodcolour') is-invalid @enderror" name="prodcolour" value="{{ old('prodcolour') }}"  autocomplete="prodcolour" autofocus>

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
                                <input id="prodquant" type="text" class="form-control @error('prodquant') is-invalid @enderror" name="prodquant" value="{{ old('prodquant') }}"  autocomplete="prodquant" autofocus>

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
                                <input id="prodprics" type="text" class="form-control @error('prodprics') is-invalid @enderror" name="prodprics" value="{{ old('prodprics') }}"  autocomplete="prodprics" autofocus>

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
                                <textarea class="form-control @error('proddescription') is-invalid @enderror" id="proddescription" name="proddescription" value="{{ old('proddescription') }}" rows="4"></textarea>
                                @error('proddescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                        <label class="col-md-3 form-label text-md-end">{{ __('Product Attributes ') }} <i class="text text-danger">( optional )</i></label>
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr>
                            <th>Attribute Name</th>
                            <th>Attribute Value</th>
                            <th>Action</th>
                            </tr>
                            <tr>
                            <td><input type="text" name="attr[0][name]" placeholder="Enter Name" class="form-control @error('attr.*.name') is-invalid @enderror" /></td>
                            <td><input type="text" name="attr[0][value]" placeholder="Enter Value" class="form-control @error('attr.*.value') is-invalid @enderror" /></td>
                            <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>
                            </tr>
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
                            <label class="col-md-3 form-label text-md-end">{{ __('Other Product Images')}} <i class="text text-danger">( Optional )</i></label>
                            <input type="file" name="img[]" class="form-control file-upload-info @error('img') is-invalid @enderror" multiple>
                            @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Product') }}
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
</script>
@endsection
