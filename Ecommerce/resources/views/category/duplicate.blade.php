@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
            <div class="col-sm-2">
                        {{ __('Error') }}
                    </div>
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                        <a href="{{route('AddCategory')}}" class="btn btn-dark btn-sm" role="button">Back</a>
                    </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('Similar Record Found !! Try with other Entry') }}
            </div>
        </div>
    </div>
</div>
@endsection
