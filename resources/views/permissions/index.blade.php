@extends('layouts.backend.master')
@section('header')
    <link href="{{url('assets/backend')}}/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
@endsection
@section('title')
  Permissions
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Permissions</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('permissions.index')}}">Permissions</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('permission.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Permission</a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Permissions List</h5>                      
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped" id="datatables">
                            <thead>
                            <tr>                                
                                <th>Name</th>
                                <th>Label</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $perm)
                            <tr>                                
                                <td><span class="line">{{$perm->name_permission}}</span></td>
                                <td>{{$perm->label}}</td>
                                <td class="text-navy"> 
                                    <a href="{{route('permission.edit',['id'=>$perm->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                    <button id="{{$perm->id}}" class='btn btn-danger'>Delete</button>
                                </td>
                            </tr>
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
   
<script src="{{url('assets/backend')}}/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
<script>
        $(document).ready(function() {
            $('#datatables').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "{{url('assets/backend')}}/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
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
                    window.location = "permission/"+id+"/delete";
                  }
                });
              });   
        });        
    </script>
@endsection
