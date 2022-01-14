@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Add Banner') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{route('PostAddBanner')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="heading" class="form-label">{{ __('Banner Heading') }} <i class="text text-danger">*</i></label>
                        <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" id="heading" placeholder="Heading" value="{{ old('heading') }}" autofocus>
                        @error('heading')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bannerdescription" class="form-label">{{ __('Banner Description   ') }} <i class="text text-danger">( optional )</i></label>
                        <textarea class="form-control @error('bannerdescription') is-invalid @enderror" id="bannerdescription" name="bannerdescription" value="{{ old('bannerdescription') }}" rows="3"></textarea>
                        @error('bannerdescription')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bannerimage" class="form-label">{{ __('File upload Banner Image ') }} <i class="text text-danger">*</i></label>
                        <input type="file" name="bannerimage" class="form-control file-upload-info @error('bannerimage') is-invalid @enderror">
                        @error('bannerimage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bannertag" class="form-label">{{ __('File upload Banner Price Tag ') }} <i class="text text-danger">( optional )</i></label>
                        <input type="file" name="bannertag" class="form-control file-upload-info @error('bannertag') is-invalid @enderror">
                        @error('bannertag')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Banner') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
