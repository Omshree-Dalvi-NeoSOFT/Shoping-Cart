@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Add Sub Category') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>

                @endif

                <form action="{{route('PostAddSubCategory')}}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-3">
                            <label for="subcatname" class="col-md-3 col-form-label text-md-end">{{ __('Sub-Category Name') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="subcatname" type="text" class="form-control @error('subcatname') is-invalid @enderror" name="subcatname" value="{{ old('subcatname') }}"  autocomplete="subcatname" autofocus>

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
                                    <option default>Select ..... </option>
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
                                <textarea class="form-control @error('subcatdescription') is-invalid @enderror" id="subcatdescription" name="subcatdescription" value="{{ old('subcatdescription') }}" rows="4"></textarea>
                                @error('subcatdescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if (count($categories) >0 )
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Sub-Category') }}
                                </button>
                            </div>
                        @else
                            <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-primary disabled">
                                    {{ __('Add Sub-Category') }} 
                                </button>
                                <i class="text text-danger">(No categories record found !)</i>
                            </div>
                        @endif
                        
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
