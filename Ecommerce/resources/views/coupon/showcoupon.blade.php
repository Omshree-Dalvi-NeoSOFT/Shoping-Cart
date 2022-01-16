@extends('layouts.app')

@section('content')
@include('layouts.navbar')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.deletecoupon').click(function(e){
            var cid=$(this).attr('cid');
            if(confirm("Delete Coupon ?")){
                $.ajax({
                    url:"{{url('/deletecoupon')}}",
                    type:'post',
                    method:'patch',
                    data:{_token:'{{csrf_token()}}',cid:cid},
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
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    {{ __('Coupons') }}
                </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
    <a href="{{route('AddCoupon')}}" class="btn btn-warning mb-3">Add Coupon</a>
    @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    <table class="table table-light table-striped" id="mytable">
        <thead class="bg-dark"> 
          <tr>
            <th scope="col">Sr No.</th>
            <th scope="col">Coupon Code</th>
            <th scope="col">Coupon Type</th>
            <th scope="col">Coupon value</th>
            <th scope="col">Cart Value</th>
            <th scope="col">Coupon Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $coupon)
               <tr>
                   <td>{{$loop->iteration}}</td>
                   <td>{{$coupon->code}}</td>
                   <td>{{$coupon->type}}</td>
                   <td>{{$coupon->value}}</td>
                   <td>{{$coupon->cart_value}}</td>
                   <td> @if($coupon->couponstatus == 1)
                        <h3><span class="badge badge-success">Active</span></h3>
                        @else 
                        <h3><span class="badge badge-warning">In Active</span></h3>
                        @endif 
                    </td>
                   <td>
                       <a href="/editcoupon/{{$coupon->id}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                       <a href="javascript:void(0)" cid={{$coupon->id}} class="btn btn-danger deletecoupon"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   </td>
                </tr>
            @endforeach
        </tbody>
      </table>
   </div>
        </div>
    </div>
</div>
@endsection