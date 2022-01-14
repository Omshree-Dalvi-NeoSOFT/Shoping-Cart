@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Update Banner') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{route('PostUpdateBanner')}}">
                    @csrf
                    <input type="hidden" value="{{$banner->id}}" name="id" />
                    <div class="mb-3">
                        <label for="heading" class="form-label">{{ __('Banner Heading') }} <i class="text text-danger">*</i></label>
                        <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" id="heading" placeholder="Heading" value="{{ $banner->heading }}" autofocus>
                        @error('heading')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bannerdescription" class="form-label">{{ __('Banner Description   ') }} <i class="text text-danger">( optional )</i></label>
                        <textarea class="form-control @error('bannerdescription') is-invalid @enderror" id="bannerdescription" name="bannerdescription" rows="3">{{$banner->description}}</textarea>
                        @error('bannerdescription')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bannerimage" class="form-label">{{ __('File upload Banner Image') }} <i class="text text-danger">*</i></label>
                        <input type="file" name="bannerimage" class="form-control file-upload-info @error('bannerimage') is-invalid @enderror" value="{{$banner->banner_image}}">
                        @error('bannerimage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img src="{{asset('images/banner/'.$banner->banner_image)}}" alt="Asset Image" width="200px" height="200px" class="mt-2" name="bannerdisplay">
                    </div>

                    <div class="mb-3">
                        <label for="bannertag" class="form-label">{{ __('File upload Banner Price Tag ') }} <i class="text text-danger">( optional )</i></label>
                        <input type="file" name="bannertag" class="form-control file-upload-info @error('bannertag') is-invalid @enderror">
                        @error('bannertag')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img src="{{asset('images/bannertags/'.$banner->price_tag)}}" alt="Asset Image" width="200px" height="200px" class="mt-2" name="bannerdisplaytag">
                    </div>

                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Banner') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
