@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  My Profile
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>My Profile</h2>            
        </div>
        <div class="col-sm-8">

            <div class="title-action">
                <a href="{{route('myprofile.edit')}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>                
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">                        
                        <div>
                            <div class="ibox-content no-padding border-left-right" style="max-height: 400px; overflow: hidden;">
                                <img id="profile-picture" style="width:100%;margin-top: 0;" alt="image" class="img-responsive" src="{{$user->getAvatarUrl()}}">
                                <div class="change-picture">                                                
                                    <a class="btn btn-primary" data-toggle="modal" href='#modalChangePicture'><i class="fa fa-camera"></i> Change Picture</a>
                                </div>
                            </div>
                            <div class="ibox-content profile-content">
                                <h4 class="text-center"><strong>{{$user->getNameOrEmail(true)}}</strong></h4>
                                <p class="text-center">{{$user->role->name}}</p>
                                <h5>
                                    About me
                                </h5>
                                <p>
                                    {{$user->about}}
                                </p>
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
                           

                        </div>
                    </div>

                </div>
            </div>
        </div>
    

    <div class="modal fade" id="modalChangePicture">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['route' =>'myprofile.change.picture', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                       <div class="input-group">
                           <span class="input-group-btn">
                             <a id="uploadbutton" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                           <input id="thumbnail" class="form-control" type="text" name="photo">
                         </div>
                         <img src="{{url('assets/backend')}}/img/no-thumbnail.jpg" id="holder" style="margin-top:15px;width:100%">  
                </div>
                <div class="modal-footer">                    
                    <input type="submit" class="btn btn-primary" value="Save">
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
<script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
$(document).ready(function(){
    var domain = "{{url('/')}}/admin/rollo-filemanager";         
    $('#uploadbutton').filemanager('image', {prefix: domain});
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
