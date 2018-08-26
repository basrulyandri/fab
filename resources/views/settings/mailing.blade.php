@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Setting
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Setting</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('posts.index')}}">General</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @include('settings.includes.menu')
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Mailing options</h5>                      
                    </div>
                    
                    <div class="ibox-content">
                    {!!Form::open(['route' =>'theme.options.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                    <div class="panel blank-panel">

                        <div class="panel-heading">                            
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1">Identitas Email</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2">Download Brosur</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class='form-group{{$errors->has('email_from') ? ' has-error' : ''}}'>
                                      {!!Form::label('email_from','Email pengirim notifikasi',['class' => 'col-sm-2 control-label'])!!}
                                      <div class="col-sm-10">
                                        {!!Form::text('email_from',getOption('email_from'),['class' => 'form-control','placeholder' => 'Email dari','required' => 'true'])!!}                            
                                        <span class="help-block">Setiap notifikasi email, akan dikirim dari email ini.</span>
                                        
                                      </div>
                                    </div>

                                    <div class='form-group{{$errors->has('email_from_label') ? ' has-error' : ''}}'>
                                      {!!Form::label('email_from_label','Nama pengirim notifikasi',['class' => 'col-sm-2 control-label'])!!}
                                      <div class="col-sm-10">
                                        {!!Form::text('email_from_label',getOption('email_from_label'),['class' => 'form-control','placeholder' => 'Email dari','required' => 'true'])!!}                            
                                        <span class="help-block">Tampilan nama pengirim notifikasi email.</span>
                                        
                                      </div>
                                    </div>
                                </div>

                                <div id="tab-2" class="tab-pane">
                                    <h4 class="text-info">Email notifikasi untuk Aplikan</h4>
                                    <div class='form-group{{$errors->has('subject_email_notification_download_brosur_to_aplikan') ? ' has-error' : ''}}'>
                                      {!!Form::label('subject_email_notification_download_brosur_to_aplikan','Judul Email',['class' => 'col-sm-2 control-label'])!!}
                                      <div class="col-sm-10">
                                        {!!Form::text('subject_email_notification_download_brosur_to_aplikan',getOption('subject_email_notification_download_brosur_to_aplikan'),['class' => 'form-control','placeholder' => 'Judul Email','required' => 'true'])!!}
                                        
                                      </div>
                                    </div>


                                    <div class='form-group{{$errors->has('content_email_notification_download_brosur_to_aplikan') ? ' has-error' : ''}}'>
                                      {!!Form::label('content_email_notification_download_brosur_to_aplikan','Isi Email',['class' => 'col-sm-2 control-label'])!!}
                                      <div class="col-sm-10">
                                        {!!Form::textarea('content_email_notification_download_brosur_to_aplikan',getOption('content_email_notification_download_brosur_to_aplikan'),['class' => 'form-control wysiwyg','placeholder' => 'Isi Email'])!!}
                                      </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-info">Email notifikasi untuk User</h4>
                                    <div class='form-group{{$errors->has('subject_email_notification_download_brosur_to_user') ? ' has-error' : ''}}'>
                                      {!!Form::label('subject_email_notification_download_brosur_to_user','Judul Email',['class' => 'col-sm-2 control-label'])!!}
                                      <div class="col-sm-10">
                                        {!!Form::text('subject_email_notification_download_brosur_to_user',getOption('subject_email_notification_download_brosur_to_user'),['class' => 'form-control','placeholder' => 'Judul Email','required' => 'true'])!!}
                                        
                                      </div>
                                    </div>


                                    <div class='form-group{{$errors->has('content_email_notification_download_brosur_to_user') ? ' has-error' : ''}}'>
                                      {!!Form::label('content_email_notification_download_brosur_to_user','Isi Email',['class' => 'col-sm-2 control-label'])!!}
                                      <div class="col-sm-10">
                                        {!!Form::textarea('content_email_notification_download_brosur_to_user',getOption('content_email_notification_download_brosur_to_user'),['class' => 'form-control wysiwyg','placeholder' => 'Isi Email'])!!}
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <h3>Pilih User yang mendapat notifikasi Form Download Brosur</h3>
                                            @foreach(\App\User::all() as $user)
                                            <div class="styled-input-single">
                                                <input type="checkbox" name="list_user_notifikasi_dowload_brosur[]" id="user-{{$user->id}}" value="{{$user->email}}" {{in_array($user->email,$list_user_notifikasi_dowload_brosur) ? 'checked' : ''}}>
                                                <label for="user-{{$user->id}}">{{$user->username}} ({{$user->email}})</label>
                                            </div>                             
                                            @endforeach           
                                    </div>
                                    </div>
                                    <hr>
                                    <h4 class="text-info">File Brosur</h4>
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                         <a id="brosurButton" data-input="file_brosur" data-preview="holder" class="btn btn-primary">
                                           <i class="fa fa-picture-o"></i> Pilih file
                                         </a>
                                       </span>
                                       <input id="file_brosur" class="form-control" type="text" name="file_brosur" value="{{getOption('file_brosur')}}">
                                     </div>

                                     <p class="text-center"><a href="{{url('/')}}{{getOption('file_brosur')}}" class="btn btn-lg btn-success">Test Download Brosur</a></p>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                    
                        
                        
                        <input type="submit" class="btn btn-primary" value="Save">
                    {!!Form::close()!!}
                        
                    </div>                    
                </div>
            </div>
        </div>
	</div>
@stop

@section('footer')   
<script src="{{url('assets/backend')}}/js/plugins/tinymce/tinymce.min.js"></script>
<script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
$(document).ready(function() {   
    var editor_config = {
                path_absolute : "{{ URL::to('/') }}/",
                selector: ".wysiwyg",
                plugins: [
                  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                  "searchreplace wordcount visualblocks visualchars code fullscreen",
                  "insertdatetime media nonbreaking save table contextmenu directionality",
                  "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                  var cmsURL = editor_config.path_absolute + 'admin/rollo-filemanager?field_name=' + field_name;
                  if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                  } else {
                    cmsURL = cmsURL + "&type=Files";
                  }

                  tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                  });
                }
              };
        
            tinymce.init(editor_config);  
            var domain = "{{url('/')}}/admin/rollo-filemanager";         
            $('#brosurButton').filemanager('file', {prefix: domain});  
            });      
</script>
@endsection
