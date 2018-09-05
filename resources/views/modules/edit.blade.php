@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Edit {{$module->name}}</h2>
       <ol class="breadcrumb">
          <li>
              <a href="{{route('modules.index')}}">Modules</a>
          </li>          
          <li>
              <a href="{{route('modules.edit',$module)}}">Edit</a>
          </li>          
      </ol>
    </div>
    <div class="col-sm-8">
        
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Edit Module</h5>          
      </div>
      <div class="ibox-content no-padding">        
            {!!Form::open(['route' =>['modules.update',$module],'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
              <div class="form-group{{$errors->has("title") ? " has-error" : ""}}">
                      {!!Form::label("title","Title",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("title",$module->title,["class" => "form-control","placeholder" => "Title"])!!}
                        @if($errors->has("title"))
                          <span class="help-block">{{$errors->first("title")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("description") ? " has-error" : ""}}">
                      {!!Form::label("description","Description",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("description",$module->description,["class" => "form-control","placeholder" => "Description"])!!}
                        @if($errors->has("description"))
                          <span class="help-block">{{$errors->first("description")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("courseitem_id") ? " has-error" : ""}}">
                      {!!Form::label("courseitem_id","Courseitem_id",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("courseitem_id",$module->courseitem_id,["class" => "form-control","placeholder" => "Courseitem_id"])!!}
                        @if($errors->has("courseitem_id"))
                          <span class="help-block">{{$errors->first("courseitem_id")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("datetime") ? " has-error" : ""}}">
                      {!!Form::label("datetime","Datetime",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("datetime",$module->datetime,["class" => "form-control","placeholder" => "Datetime"])!!}
                        @if($errors->has("datetime"))
                          <span class="help-block">{{$errors->first("datetime")}}</span>
                        @endif
                      </div>
                    </div>
                    
              <input type="submit" class="btn btn-primary" value="Update">
            {!!Form::close()!!}          
      </div>
  </div>   
</div>

@stop