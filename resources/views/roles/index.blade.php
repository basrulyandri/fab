@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Roles List
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Roles</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('roles.index')}}">Roles</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('role.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Role</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$no}}</td>
                                <td><a href="{{route('role.edit',['id' => $role->id])}}">{{$role->name}}</a></td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <button id="{{$role->id}}" class='btn btn-danger'>Delete</button>
                                </td>
                            </tr>
                            <?php $no++;?>
                            @endforeach                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('footer')
 <script>
        $(document).ready(function() {            
            $('body').on('click','.btn-danger',function(){
                //alert('test');
                var id = $(this).attr('id');
                swal({
                  title:'SURE ?',
                   text: "Want to delete this permission ?",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, delete it!",
                   closeOnConfirm: true,
                },function(isConfirm){
                  if (isConfirm) {
                    window.location = "role/"+id+"/delete";
                  }
                });
              });   
        });        
    </script>
@endsection
