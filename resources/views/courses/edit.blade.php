@extends('layouts.backend.master')
@section('title')
  Edit Course | {{$course->title}}
@stop
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Edit {{$course->name}}</h2>
       <ol class="breadcrumb">
          <li>
              <a href="{{route('courses.index')}}">Courses</a>
          </li>          
          <li>
              <a href="{{route('courses.edit',$course)}}">Edit</a>
          </li>          
      </ol>
    </div>
    <div class="col-sm-8">
        
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Edit Course</h5>          
      </div>
      <div class="ibox-content">        
        {!!Form::open(['route' =>['courses.update',$course],'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
          <div class="form-group{{$errors->has("title") ? " has-error" : ""}}">
                  {!!Form::label("title","Title",["class" => "col-sm-2 control-label"])!!}
                  <div class="col-sm-10">
                    <div class="input-group">
                    {!!Form::text("title",$course->title,["class" => "form-control","placeholder" => "Title"])!!}
                    <span class="input-group-btn"> <a class="btn btn-primary translateBtn" foreign-key-id="{{$course->id}}" table-name="courses" field-name="title" data-toggle="modal" model-name="Course" is-html="0" href='#translate'>Translate Title</a> </span>
                  </div>
                    @if($errors->has("title"))                    
                      <span class="help-block">{{$errors->first("title")}}</span>
                    @endif
                  </div>
                </div>

                <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
                  {!!Form::label('description','Description',['class' => 'col-sm-2 control-label'])!!}
                  <div class="col-sm-10">
                    {!!Form::textarea('description',$course->description,['class' => 'form-control tinyMCE','placeholder' => 'Description'])!!}
                    <a class="btn btn-primary translateBtn" foreign-key-id="{{$course->id}}" table-name="courses" field-name="description" data-toggle="modal" model-name="Course" is-html="1" href='#translate'>Translate Description</a>
                    @if($errors->has('description'))
                      <span class="help-block">{{$errors->first('description')}}</span>
                    @endif
                  </div>
                </div>  
            <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
              {!!Form::label('thumbnail','thumbnail',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
              <div class="input-group">
                 <span class="input-group-btn">
                   <a id="uploadbutton" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                     <i class="fa fa-picture-o"></i> Choose
                   </a>
                 </span>
                 <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{$course->thumbnail}}">
               </div>
               <img src="{{url('/').$course->thumbnail}}" id="holder" style="margin-top:15px;width:20%">          
             </div>
            </div>              
                
          <input type="submit" class="btn btn-primary" value="Update">
        {!!Form::close()!!}          
      </div>
  </div>   
</div>

@stop

@section('footer')
  <script>
    $(document).ready(function(){
      var domain = "{{url('/')}}/admin/rollo-filemanager";
      $('#uploadbutton').filemanager('image', {prefix: domain});      
    });
  </script>
@stop