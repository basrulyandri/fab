@extends('layouts.backend.master')
@section('header')
    <link href="{{url('assets/backend')}}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
@endsection
@section('title')
  Edit Page
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Edit Page</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('static.pages.index')}}">Pages</a>
                </li> 
                <li class="active">
                    <a href="{{route('static.page.add')}}">Add New</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-lg-9">
                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">
                    
                    {!!Form::open(['route' => ['static.page.update','post'=>$page],'class' => 'form-horizontal'])!!}
                        <div class='form-group{{$errors->has('title') ? ' has-error' : ''}}'>
                            {!!Form::label('title','Title',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              <div class="input-group">
                              {!!Form::text('title',$page->title,['class' => 'form-control','placeholder' => 'Title','required' => 'true'])!!}
                              <span class="input-group-btn"> <a class="btn btn-primary translateBtn" foreign-key-id="{{$page->id}}" table-name="posts" field-name="title" data-toggle="modal" model-name="Post" is-html="0" href='#translate'>Translate</a> </span>
                              </div>
                              @if($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                              @endif
                            </div>
                        </div>

                        <div class='form-group{{$errors->has('body') ? ' has-error' : ''}}'>
                            {!!Form::label('body','Body',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::textarea('body',$page->body,['class' => 'form-control','placeholder' => 'Body','id' => 'tinyMCE'])!!}
                              <a class="btn btn-primary translateBtn" foreign-key-id="{{$page->id}}" table-name="posts" field-name="body" data-toggle="modal" model-name="Post" is-html="1" href='#translate'>Translate</a>
                              @if($errors->has('body'))
                                <span class="help-block">{{$errors->first('body')}}</span>
                              @endif
                            </div>

                        </div>

                       <div class='form-group{{$errors->has('excerpt') ? ' has-error' : ''}}'>
                           {!!Form::label('excerpt','Excerpt',['class' => 'col-sm-2 control-label'])!!}
                           <div class="col-sm-10">
                             {!!Form::textarea('excerpt',$page->excerpt,['class' => 'form-control','placeholder' => 'Excerpt'])!!}
                             @if($errors->has('excerpt'))
                               <span class="help-block">{{$errors->first('excerpt')}}</span>
                             @endif
                           </div>
                       </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3">                
                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">
                        <h4>Image Thumbnail</h4> 
                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="uploadbutton" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                           <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{$page->thumbnail()}}">
                         </div>
                         <img src="{{url('/')}}{{$page->thumbnail()}}" id="holder" style="margin-top:15px;width:100%">  

                        <div class="alert alert-warning">                                            
                            Untuk Slider thumbnail harus berukuran 1170 x 400 px
                        </div>                      
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@stop

@section('footer')   
<script src="{{url('assets/backend')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/tinymce/tinymce.min.js"></script>
<script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
        $(document).ready(function() {           
            var editor_config = {
                path_absolute : "{{ URL::to('/') }}/",
                selector: "#tinyMCE",
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
            $('#uploadbutton').filemanager('image', {prefix: domain});                     

        });        
    </script>
@endsection
