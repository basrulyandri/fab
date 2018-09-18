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
                        {!!Form::text("title",$course->title,["class" => "form-control","placeholder" => "Title"])!!}
                        @if($errors->has("title"))
                          <span class="help-block">{{$errors->first("title")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class='form-group{{$errors->has('slug') ? ' has-error' : ''}}'>
                      {!!Form::label('slug','Slug',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('slug',$course->slug,['class' => 'form-control','placeholder' => 'Slug','required' => 'true'])!!}
                        @if($errors->has('slug'))
                          <span class="help-block">{{$errors->first('slug')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
                      {!!Form::label('description','Description',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::textarea('description',$course->description,['class' => 'form-control tinyMCE','placeholder' => 'Description'])!!}
                        @if($errors->has('description'))
                          <span class="help-block">{{$errors->first('description')}}</span>
                        @endif
                      </div>
                    </div>   

                    <div class='form-group{{$errors->has('excerpt') ? ' has-error' : ''}}'>
                                       {!!Form::label('excerpt','Excerpt',['class' => 'col-sm-2 control-label'])!!}
                                       <div class="col-sm-10">
                                         {!!Form::textarea('excerpt',$course->excerpt,['class' => 'form-control','placeholder' => 'Excerpt'])!!}
                                         @if($errors->has('excerpt'))
                                           <span class="help-block">{{$errors->first('excerpt')}}</span>
                                         @endif
                                       </div>
                                     </div>                 
                    <div class='form-group{{$errors->has('level_id') ? ' has-error' : ''}}'>
                      {!!Form::label('level_id','Level',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::select('level_id',\App\Level::pluck('title','id')->prepend('Choose Level',''),$course->level_id,['class' => 'form-control'])!!}
                        @if($errors->has('level_id'))
                          <span class="help-block">{{$errors->first('level_id')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
              {!!Form::label('thumbnail','Thumbnail',['class' => 'col-sm-2 control-label'])!!}
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