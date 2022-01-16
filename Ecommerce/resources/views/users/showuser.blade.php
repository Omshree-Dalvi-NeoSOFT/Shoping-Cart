@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">{{ __('Modify User') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover" id="example1">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$user->firstname}} {{$user->lastname}}</td>
                                <td>{{$user->email}}</td>
                                @foreach ($roles as $role )
                                    @if ($role->role_id == $user->role_id)
                                        <td>{{$role->role_name}}</td>
                                    @endif
                                @endforeach
                                <td> @if($user->status == 1)
                                  <h3><span class="badge badge-success">Active</span></h3>
                               @else 
                                <h3><span class="badge badge-warning">In Active</span></h3>
                                @endif </td>
                                <td><a href="edituser/{{ $user->id }}" class="btn btn-info btn-sm" role="button">Edit</a> | <a type="button" class="btn btn-danger btn-sm dtlpro" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aid="{{$user->id}}">
                                    Delete</a>
                                <!-- Modal -->
                                    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirm Delete</h5>
                                            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            User will be deleted !!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a type="button" href="javascript:void(0)" class="btn btn-danger dtlpro" aid="{{ $user->id }}" role="button">Delete</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".dtlpro").click(function(e){
                var aid = $(this).attr("aid");
                if(confirm('Do you want to delete ?')){
                    $.ajax({
                        url:"{{url('/deleteuser')}}",
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
        })
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
          
@endsection
