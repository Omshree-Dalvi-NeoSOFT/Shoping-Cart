@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="content-wrapper p-2">   
    <div class="container-fluid">
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    {{ __('Sub-Category') }}
                </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table" id="example1">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sub-Category Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Sub-Category Description</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcats as $cat )
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$cat->subcat_name}}</td>
                                @foreach ($categories as $c )
                                    @if ($cat->category_id == $c->id)
                                    <td>{{$c->cat_name}}</td>
                                    @endif                                    
                                @endforeach
                                <td>{{$cat->subcat_description}}</td>
                                <td><a href="editsubcategory/{{ $cat->id }}" class="btn btn-warning btn-sm" role="button">Edit</a> | <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" aid="{{$cat->id}}">
                                    Delete</a>
                                <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Confirm Delete</h5>
                                            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
                                        </div>
                                        <div class="modal-body">
                                            Sub-Category will be deleted !!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a type="button" href="javascript:void(0)" class="btn btn-danger dtlban" aid="{{ $cat->id }}" role="button">Delete</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div></td>
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
            $(".dtlban").click(function(e){
                var aid = $(this).attr("aid");
                if(confirm){
                    $.ajax({
                        url:"{{url('/deletesubcategory')}}",
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
