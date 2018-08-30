@extends('layouts.backend.master')
@section('header')
    <link href="{{url('assets/backend')}}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/backend')}}/js/plugins/bootstrap-tags-input/src/bootstrap-tagsinput.css">
    

@endsection
@section('title')
  Add New Post
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
                    {!!Form::open(['route' => 'post.create','class' => 'form-horizontal'])!!}
                        <div class='form-group{{$errors->has('title') ? ' has-error' : ''}}'>
                            {!!Form::label('title','Title',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">                              
                                {!!Form::text('title',old('title'),['class' => 'form-control','placeholder' => 'Title','required' => 'true'])!!}                                
                              @if($errors->has('title'))
                                <span class="help-block">{{$errors->first('title')}}</span>
                              @endif
                            </div>
                        </div>

                        <div class='form-group{{$errors->has('body') ? ' has-error' : ''}}'>
                            {!!Form::label('body','Body',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::textarea('body',old('body'),['class' => 'form-control tinyMCE','placeholder' => 'Body'])!!}
                              @if($errors->has('body'))
                                <span class="help-block">{{$errors->first('body')}}</span>
                              @endif
                            </div>
                        </div>

                       <div class='form-group{{$errors->has('excerpt') ? ' has-error' : ''}}'>
                           {!!Form::label('excerpt','Excerpt',['class' => 'col-sm-2 control-label'])!!}
                           <div class="col-sm-10">
                             {!!Form::textarea('excerpt',old('excerpt'),['class' => 'form-control','placeholder' => 'Excerpt'])!!}
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
                                    <input type="checkbox" name="categories[]" value="{{$cat->id}}"> {{$cat->label}}
                                </label>
                            </div>                            
                        @endforeach
                            
                    </div>
                        <a class="btn btn-sm" data-toggle="modal" href='#addCategory'>Add New Category</a>
                </div>

                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">
                        <h4>Tags</h4>                       
                        <input type="text" name="tags" id="tags">
                        
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
                           <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                         </div>
                         <img src="{{url('assets/backend')}}/img/no-thumbnail.jpg" id="holder" style="margin-top:15px;width:100%">  

                        <div class="alert alert-warning">                                            
                            If this post for slider, best thumbnail size is 1170 x 400 px
                        </div>                      
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Publish">
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
<script src="{{url('assets/backend')}}/js/plugins/bootstrap-tags-input/src/bootstrap-tagsinput.js"></script>

<script>
        $(document).ready(function() {
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

            $('input#tags').tagsinput({
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
