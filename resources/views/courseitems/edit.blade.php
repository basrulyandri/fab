@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Edit {{$courseitem->name}}</h2>
       <ol class="breadcrumb">
          <li>
              <a href="{{route('courseitems.index')}}">Courseitems</a>
          </li>          
          <li>
              <a href="{{route('courseitems.edit',$courseitem)}}">Edit</a>
          </li>          
      </ol>
    </div>
    <div class="col-sm-8">
        
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Edit Courseitem</h5>          
      </div>
      <div class="ibox-content no-padding">        
            {!!Form::open(['route' =>['courseitems.update',$courseitem],'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
              <div class="form-group{{$errors->has("title") ? " has-error" : ""}}">
                      {!!Form::label("title","Title",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("title",$courseitem->title,["class" => "form-control","placeholder" => "Title"])!!}
                        @if($errors->has("title"))
                          <span class="help-block">{{$errors->first("title")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("description") ? " has-error" : ""}}">
                      {!!Form::label("description","Description",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("description",$courseitem->description,["class" => "form-control","placeholder" => "Description"])!!}
                        @if($errors->has("description"))
                          <span class="help-block">{{$errors->first("description")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("course_id") ? " has-error" : ""}}">
                      {!!Form::label("course_id","Course_id",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("course_id",$courseitem->course_id,["class" => "form-control","placeholder" => "Course_id"])!!}
                        @if($errors->has("course_id"))
                          <span class="help-block">{{$errors->first("course_id")}}</span>
                        @endif
                      </div>
                    </div>
                    
              <input type="submit" class="btn btn-primary" value="Update">
            {!!Form::close()!!}          
      </div>
  </div>   
</div>

@stop