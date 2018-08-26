@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Posts
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Posts</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('posts.index')}}">Posts</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('post.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Post</a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Posts List</h5>                      
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped" id="datatables">
                            <thead>
                            <tr>                                
                                <th>Title</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>                                
                                <td><span class="line">{{$post->title}}</span></td>
                                <td>{{$post->status}}</td>
                                <td>{!!$post->categories_comma(true)!!}</td>
                                <td>{{$post->tags_comma()}}</td>
                                <td class="text-navy"> 
                                    <a target="_blank" href="{{route('page.single',['slug'=>$post->slug])}}" class="btn btn-warning"><i class="fa fa-eye"></i> View</a>
                                    <a href="{{route('post.edit',$post)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                    <button id="{{$post->id}}" class='btn btn-danger'>Delete</button>
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
                    window.location = "post/"+id+"/delete";
                  }
                });
              });   
        });        
    </script>
@endsection
