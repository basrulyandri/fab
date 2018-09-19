@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Edit {{$testimonial->name}}</h2>
       <ol class="breadcrumb">
          <li>
              <a href="{{route('testimonials.index')}}">Testimonials</a>
          </li>          
          <li>
              <a href="{{route('testimonials.edit',$testimonial)}}">Edit</a>
          </li>          
      </ol>
    </div>
    <div class="col-sm-8">
        
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Edit Testimonial</h5>          
      </div>
      <div class="ibox-content no-padding">        
            {!!Form::open(['route' =>['testimonials.update',$testimonial],'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
              <div class="form-group{{$errors->has("name") ? " has-error" : ""}}">
                      {!!Form::label("name","Name",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("name",$testimonial->name,["class" => "form-control","placeholder" => "Name"])!!}
                        @if($errors->has("name"))
                          <span class="help-block">{{$errors->first("name")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("position_title") ? " has-error" : ""}}">
                      {!!Form::label("position_title","Position_title",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("position_title",$testimonial->position_title,["class" => "form-control","placeholder" => "Position_title"])!!}
                        @if($errors->has("position_title"))
                          <span class="help-block">{{$errors->first("position_title")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("course") ? " has-error" : ""}}">
                      {!!Form::label("course","Course",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("course",$testimonial->course,["class" => "form-control","placeholder" => "Course"])!!}
                        @if($errors->has("course"))
                          <span class="help-block">{{$errors->first("course")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("body") ? " has-error" : ""}}">
                      {!!Form::label("body","Body",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("body",$testimonial->body,["class" => "form-control","placeholder" => "Body"])!!}
                        @if($errors->has("body"))
                          <span class="help-block">{{$errors->first("body")}}</span>
                        @endif
                      </div>
                    </div>
                    
              <input type="submit" class="btn btn-primary" value="Update">
            {!!Form::close()!!}          
      </div>
  </div>   
</div>

@stop