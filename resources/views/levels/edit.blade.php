@extends('layouts.backend.master')
@section('title')
  Edit Level | {{$level->title}}
@stop
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Edit {{$level->name}}</h2>
       <ol class="breadcrumb">
          <li>
              <a href="{{route('levels.index')}}">Levels</a>
          </li>          
          <li>
              <a href="{{route('levels.edit',$level)}}">Edit</a>
          </li>          
      </ol>
    </div>
    <div class="col-sm-8">
        
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Edit Level</h5>          
      </div>
      <div class="ibox-content">        
        {!!Form::open(['route' =>['levels.update',$level],'method' => 'PATCH', 'class' => 'form-horizontal'])!!}
          <div class="form-group{{$errors->has("title") ? " has-error" : ""}}">
                  {!!Form::label("title","Title",["class" => "col-sm-2 control-label"])!!}
                  <div class="col-sm-10">
                    <div class="input-group">
                    {!!Form::text("title",$level->title,["class" => "form-control","placeholder" => "Title"])!!}
                    <span class="input-group-btn"> <a class="btn btn-primary translateBtn" foreign-key-id="{{$level->id}}" table-name="levels" field-name="title" data-toggle="modal" model-name="Level" is-html="0" href='#translate'>Translate Title</a> </span>
                  </div>
                    @if($errors->has("title"))                    
                      <span class="help-block">{{$errors->first("title")}}</span>
                    @endif
                  </div>
                </div>
                <div class='form-group{{$errors->has('slug') ? ' has-error' : ''}}'>
                  {!!Form::label('slug','Slug',['class' => 'col-sm-2 control-label'])!!}
                  <div class="col-sm-10">
                    {!!Form::text('slug',$level->slug,['class' => 'form-control','placeholder' => 'Slug','required' => 'true'])!!}
                    @if($errors->has('slug'))
                      <span class="help-block">{{$errors->first('slug')}}</span>
                    @endif
                  </div>
                </div>

                <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
                  {!!Form::label('description','Description',['class' => 'col-sm-2 control-label'])!!}
                  <div class="col-sm-10">
                    {!!Form::textarea('description',$level->description,['class' => 'form-control tinyMCE','placeholder' => 'Description'])!!}
                    <a class="btn btn-primary translateBtn" foreign-key-id="{{$level->id}}" table-name="levels" field-name="description" data-toggle="modal" model-name="Level" is-html="1" href='#translate'>Translate Description</a>
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
                 <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{$level->thumbnail}}">
               </div>
               <img src="{{url('/').$level->thumbnail}}" id="holder" style="margin-top:15px;width:20%">          
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