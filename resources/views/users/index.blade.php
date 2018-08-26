@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Users
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Users</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('users.index')}}">Users</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('user.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        @foreach($users as $user)
            <div class="col-lg-4">
                <div class="contact-box animated pulse">
                <div class="ibox-tools">                    
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('user.edit',$user)}}"><i class="fa fa-edit"></i></a>
                        </li>
                        <li><a user-id="{{$user->id}}" class="hapus" href="#"><i class="fa fa-trash"></i></a>
                        </li>
                    </ul>                    
                </div>
                    <a href="{{route('user.profile',['username' => $user->username])}}">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{$user->getAvatarUrl()}}">
                            <div class="m-t-xs font-bold">{{$user->role->name}}</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>{{$user->getNameOrEmail(true)}}</strong></h3>
                        <p><i class="fa fa-mobile-phone"></i> {{$user->phone}}</p>
                        <address>                            
                                                       
                        </address>
                        <ul class="user-social">
                        	<li style="color:#3b5998"><a target="_blank" href="{{$user->facebook_url or '#'}}"><i class="fa fa-facebook-square"></i></a></li>
                        	<li style="color:#1dcaff"><a target="_blank" href="{{$user->twitter_url or '#'}}"><i class="fa fa-twitter-square"></i></a></li>
                        	<li style="color:#d34836"><a target="_blank" href="{{$user->google_plus_url or '#'}}"><i class="fa fa-google-plus-square"></i></a></li>
                        </ul>                        
                    </div>
                    <div class="clearfix"></div>
                        </a>
                </div>
            </div> 
        @endforeach           
        </div>
	</div>
@stop

@section('footer')
<script>
    
    $('body').on('click','.hapus',function(){
                //alert('test');
                var id = $(this).attr('user-id');
                swal({
                  title:'SURE ?',
                   text: "Want to delete this user ?",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, delete it!",
                   closeOnConfirm: true,
                },function(isConfirm){
                  if (isConfirm) {
                    window.location = "user/"+id+"/delete";
                  }
                });
              });   
</script>
@endsection
