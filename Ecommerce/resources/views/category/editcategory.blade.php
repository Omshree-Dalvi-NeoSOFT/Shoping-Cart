@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Edit Category') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>

                @endif

                <form action="{{route('UpdateCategory')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$category->id}}" name="catid"/>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-3">
                            <label for="catname" class="col-md-3 col-form-label text-md-end">{{ __('Category Name') }} <i class="text text-danger">*</i></label>
                            <div class="col-md-8">
                                <input id="catname" type="text" class="form-control @error('catname') is-invalid @enderror" name="catname" value="{{ $category->cat_name }}"  autocomplete="catname" autofocus>

                                @error('catname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="catdescription" class="col-md-3 form-label text-md-end">{{ __('Category Description ') }} <i class="text text-danger">( optional )</i></label>
                            <div class="col-md-8">
                                <textarea class="form-control @error('catdescription') is-invalid @enderror" id="catdescription" name="catdescription" rows="4">{{$category->cat_description}}</textarea>
                                @error('catdescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Category') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
