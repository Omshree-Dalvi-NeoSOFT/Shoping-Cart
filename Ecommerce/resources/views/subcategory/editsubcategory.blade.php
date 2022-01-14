@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Edit Sub Category') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>

                @endif

                <form action="{{route('UpdateSubCategory')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$subcat->id}}"/>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-3">
                            <label for="subcatname" class="col-md-3 col-form-label text-md-end">{{ __('Sub-Category Name') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="subcatname" type="text" class="form-control @error('subcatname') is-invalid @enderror" name="subcatname" value="{{ $subcat->subcat_name }}"  autocomplete="subcatname" autofocus>

                                @error('subcatname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="category" class="col-md-3 col-form-label text-md-end">{{ __(' Category Type ') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <select class="form-control @error('cattype') is-invalid @enderror" id="category" name="cattype">
                                    <!-- foreach render types  -->
                                    <option value="{{$category->id}}" default>{{$category->cat_name}} </option>
                                @foreach ($categories as $type)
                                    <option value="{{$type->id}}">{{$type->cat_name}}</option>
                                @endforeach
                                </select>
                                @error('cattype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="subcatdescription" class="col-md-3 form-label text-md-end">{{ __('Sub-Category Description ') }} <i class="text text-danger">(optional)</i></label>
                            <div class="col-md-8">
                                <textarea class="form-control @error('subcatdescription') is-invalid @enderror" id="subcatdescription" name="subcatdescription" value="{{ old('subcatdescription') }}" rows="4">{{$subcat->subcat_description}}</textarea>
                                @error('subcatdescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Sub-Category') }}
                            </button>
                        </div>                        
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
