@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Pages
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pages</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('static.pages.index')}}">Pages</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('static.page.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Page</a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pages List</h5>                      
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped" id="datatables">
                            <thead>
                            <tr>                                
                                <th>Title</th>
                                <th>Status</th>                                
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                            <tr>                                
                                <td><span class="line">{{$page->title}}</span></td>
                                <td>{{$page->status}}</td>                                
                                <td class="text-navy"> 
                                    <a target="_blank" href="{{route('page.single',['slug'=>$page->slug])}}" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
                                    <a href="{{route('static.page.edit',$page)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                    <button id="{{$page->id}}" class='btn btn-danger'>Delete</button>
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

<script>
        $(document).ready(function() {           
            $('body').on('click','.btn-danger',function(){
                //alert('test');
                var id = $(this).attr('id');
                swal({
                  title:'SURE ?',
                   text: "Want to delete this Post ?",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, delete it!",
                   closeOnConfirm: true,
                },function(isConfirm){
                  if (isConfirm) {
                    window.location = "page/"+id+"/delete";
                  }
                });
              });   
        });        
    </script>
@endsection
