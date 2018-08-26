@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Users
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Profile</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('users.index')}}">Users</a>
                </li>
                <li class="active">
                    <a href="{{\Request::url()}}">Profile</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">

            <div class="title-action">
            @if($user->canAccess('user.edit'))
                <a href="{{route('user.edit',['user' => $user->id] )}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
            @endif

            @if($user->canAccess('user.delete'))
                <a href="#" user-id="{{$user->id}}" class="btn btn-danger hapus"><i class="fa fa-trash"></i> Hapus</a>
            @endif
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-circle img-responsive" src="{{$user->getAvatarUrl()}}">
                                <div class="text-center">{!!$user->stars()!!}</div>
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong>{{$user->getNameOrEmail(true)}}</strong></h4>
                                <p>{{$user->role->name}}</p>
                                <h5>
                                    About me
                                </h5>
                                <p>
                                    {{$user->about}}
                                </p>
                                <div class="row m-t-lg">
                                    <div class="col-md-4">
                                        <h5><strong>{{$user->aplikan()->count()}}</strong> Aplikan</h5>
                                    </div>
                                    <div class="col-md-4">                                        
                                        <h5><strong>{{$user->followup()->count()}}</strong> Follow Up</h5>
                                    </div>
                                    <div class="col-md-4">                                        
                                        <h5><strong>{{$user->register()->count()}}</strong> Closing</h5>
                                    </div>
                                </div>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Kirim Pesan</button>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                    </div>
                <div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Aktifitas Terakhir</h5>                            
                        </div>
                        <div class="ibox-content" style="display: block;">
                            
                            <div>
                                <div class="feed-activity-list">                                  
                                    @foreach(userActivities($user) as $activity)
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="{{$user->getAvatarUrl()}}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">{{$activity->pivot->created_at->diffForHumans()}}</small>
                                            <strong>{{$user->first_name}}</strong> {{$activity->pivot->getTable()}} aplikan <strong><a href="{{route('aplikan.detail',$activity)}}">{{$activity->nama}}</a></strong>. <br>
                                            <small class="text-muted">{{$activity->pivot->created_at->format('d M Y')}}</small>
                                            <div class="well">
                                                {{$activity->pivot->keterangan}}
                                            </div>
                                            <!-- <div class="pull-right">
                                                <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    
@stop

@section('footer')
<script>
$(document).ready(function(){

    $('body').on('click','.hapus',function(){
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
            window.location = ""+id+"/delete";
          }
        });
      });   
})

</script>
@endsection
