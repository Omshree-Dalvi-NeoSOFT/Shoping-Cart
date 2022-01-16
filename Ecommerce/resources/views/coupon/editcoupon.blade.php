
@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Edit Coupon') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>

                @endif
                <form action="{{route('UpdateCoupon')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$coupon->id}}" name="id" />
                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Coupon Code') }}<span class="text-danger ml-2">*</span></label>
                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $coupon->code }}" autocomplete="code" autofocus>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Coupon Type') }}<span class="text-danger ml-2">*</span></label>

                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control @error('code') is-invalid @enderror"  autocomplete="type" autofocus>
                                <option value="{{ $coupon->type }}" selected>{{ $coupon->type }}</option>
                                @if ($coupon->type == 'fixed')
                                <option value="percent">Percent</option>
                                @else
                                <option value="fixed">Fixed</option>
                                @endif  
                            </select>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="value" class="col-md-4 col-form-label text-md-end">{{ __('Coupon Value') }}<span class="text-danger ml-2">*</span></label>


                        <div class="col-md-6">
                            <input id="value" type="text" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ $coupon->value }}" autocomplete="value" autofocus>

                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cart_value" class="col-md-4 col-form-label text-md-end">{{ __('Cart Value') }}<span class="text-danger ml-2">*</span></label>


                        <div class="col-md-6">
                            <input id="cart_value" type="text" class="form-control @error('cart_value') is-invalid @enderror" name="cart_value" value="{{ $coupon->cart_value }}" autocomplete="cart_value" autofocus>

                            @error('cart_value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Coupon Status') }}<span class="text-danger ml-2">*</span></label>

                        <div class="col-md-6">
                            <select name="couponstatus" id="couponstatus" class="form-control @error('code') is-invalid @enderror" autocomplete="couponstatus" autofocus>
                                <option value="{{$coupon->couponstatus}}" selected>
                                    @if ($coupon->couponstatus == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </option>
                                @if ($coupon->couponstatus == 1)
                                <option value="0">Inactive</option>
                                    @else
                                    <option value="1">Active</option>
                                    @endif
                                
                                
                            </select>
                            @error('couponstatus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Coupon') }}
                                </button>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6 offset-md-4">
                                <p class="text-success"><span class="text-danger ml-1"><b>*</b></span> fields are required</p>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection