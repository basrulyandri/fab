@extends('layouts.backend.master')
@section('header')
    <link href="{{url('assets/backend')}}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/backend')}}/js/plugins/bootstrap-tags-input/src/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="{{url('assets/backend')}}/js/plugins/typeahead/typeahead.css">

@endsection
@section('title')
  Edit Post
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Posts</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('posts.index')}}">Posts</a>
                </li> 
                <li class="active">
                    <a href="{{route('post.add')}}">Add New</a>
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
                    
                    {!!Form::open(['route' => ['post.update','post'=>$post],'class' => 'form-horizontal'])!!}
                        <div class='form-group{{$errors->has('title') ? ' has-error' : ''}}'>
                            {!!Form::label('title','Title',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Title','required' => 'true'])!!}
                              @if($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                              @endif
                            </div>
                        </div>

                        <div class='form-group{{$errors->has('body') ? ' has-error' : ''}}'>
                            {!!Form::label('body','Body',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::textarea('body',$post->body,['class' => 'form-control','placeholder' => 'Body','id' => 'tinyMCE'])!!}
                              @if($errors->has('body'))
                                <span class="help-block">{{$errors->first('body')}}</span>
                              @endif
                            </div>
                        </div>

                       <div class='form-group{{$errors->has('excerpt') ? ' has-error' : ''}}'>
                           {!!Form::label('excerpt','Excerpt',['class' => 'col-sm-2 control-label'])!!}
                           <div class="col-sm-10">
                             {!!Form::textarea('excerpt',$post->excerpt,['class' => 'form-control','placeholder' => 'Excerpt'])!!}
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
                    <div class="ibox-content" id="categoryList">
                        <h4>Categories</h4>
                        @foreach($categories as $cat)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="categories[]" value="{{$cat->id}}" @if(in_array($cat->id,$post->categories()->pluck('categories.id')->toArray())) checked @endif>  {{$cat->label}}
                                </label>
                            </div>                            
                        @endforeach
                            
                    </div>
                        <a class="btn btn-sm" data-toggle="modal" href='#addCategory'>Add New Category</a>
                </div>

                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">
                        <h4>Tags</h4>                       
                        <input type="text" name="tags" id="tags" value="{{$post->tags_comma()}}">                        
                    </div>
                </div>

                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">
                        <h4>Image Thumbnail</h4> 
                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="uploadbutton" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                           <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{$post->thumbnail()}}">
                         </div>
                         <img src="{{url('/')}}{{$post->thumbnail()}}" id="holder" style="margin-top:15px;width:100%">  

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
        
    <!-- Modal Add Category -->
    <div class="modal fade" id="addCategory">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add new Category</h4>
                </div>
                <div class="modal-body form-horizontal">                   

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="Category Name" required="true" name="categoryName" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">                  
                    <button id="saveCategory" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>    
@stop

@section('footer')   
<script src="{{url('assets/backend')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/tinymce/tinymce.min.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/dropzone/dropzone.js"></script>

<script src="{{url('assets/backend')}}/js/plugins/bootstrap-tags-input/src/bootstrap-tagsinput.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/typeahead/typeahead.js"></script>
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

            

            //bootstrap-tags-input-and-typeahead
            var tagsName = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
              queryTokenizer: Bloodhound.tokenizers.whitespace,              
              remote: {
                    url:"{{route('tags.search')}}?tags=%QUERY",
                    wildcard:'%QUERY'
              }                             
            });
            tagsName.initialize();
            var elt = $('input#tags');
            elt.tagsinput({                             
                typeaheadjs: {
                    name: 'tagsName',
                    displayKey: 'name',
                    valueKey: 'name',
                    source: tagsName.ttAdapter()
                }
            });


            

            $('#saveCategory').click(function(){
                var input = $('input[name="categoryName"]');
                var _token = '{{Session::token()}}';
                if(input.val() != ''){
                    $.ajax({
                        method:'POST',
                        url:'{{route('category.addAjax')}}',
                        data:{_token:_token,name:input.val()}
                        }).success(function(data){
                          $('#categoryList').append(data['checkbox']);
                      });
                    input.val("");
                    $('#addCategory').modal('toggle')
                }
            });

        });        
    </script>
@endsection
