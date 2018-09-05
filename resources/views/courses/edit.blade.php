@extends('layouts.backend.master')

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

                <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
                  {!!Form::label('description','Description',['class' => 'col-sm-2 control-label'])!!}
                  <div class="col-sm-10">
                    {!!Form::textarea('description',$course->description,['class' => 'form-control tinyMCE','placeholder' => 'Description'])!!}
                    @if($errors->has('description'))
                      <span class="help-block">{{$errors->first('description')}}</span>
                    @endif
                  </div>
                </div>                
                
          <input type="submit" class="btn btn-primary" value="Update">
        {!!Form::close()!!}          
      </div>
  </div>   
</div>

@stop