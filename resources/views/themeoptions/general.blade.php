@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Theme Option
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Theme Options</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('posts.index')}}">General</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @include('themeoptions.includes.menu')
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">
                    {!!Form::open(['route' =>'theme.options.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                    <div class='form-group'>
                        {!!Form::label('theme_option_logo','Logo',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-6">
                            <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> Choose
                                 </a>
                               </span>
                               <input id="thumbnail" class="form-control" type="text" name="theme_option_logo" value="{{getOption('theme_option_logo')}}">
                             </div>
                             <span class="help-block">Ukuran terbaik 255 x 69 pixel</span>
                         </div>
                         <div class="col-sm-4">
                            <img src="{{url('/').getOption('theme_option_logo')}}" id="holder" style="width:100%;">
                         </div>
                    </div>
                    <hr>                    

                    <div class='form-group{{$errors->has('theme_option_hotline') ? ' has-error' : ''}}'>
                      {!!Form::label('theme_option_hotline','Hotline Number',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('theme_option_hotline',getOption('theme_option_hotline'),['class' => 'form-control','placeholder' => 'Hotline Number','required' => 'true'])!!}
                        @if($errors->has('theme_option_hotline'))
                          <span class="help-block">{{$errors->first('theme_option_hotline')}}</span>
                        @endif
                      </div>
                    </div>
                    <hr>

                    <h3>Social Media</h3>  

                    <div class='form-group{{$errors->has('theme_option_facebook_url') ? ' has-error' : ''}}'>
                      {!!Form::label('theme_option_facebook_url','Facebook URL',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('theme_option_facebook_url',getOption('theme_option_facebook_url'),['class' => 'form-control','placeholder' => 'Facebook URL','required' => 'true'])!!}
                        @if($errors->has('theme_option_facebook_url'))
                          <span class="help-block">{{$errors->first('theme_option_facebook_url')}}</span>
                        @endif
                      </div>
                    </div>

                    <div class='form-group{{$errors->has('theme_option_twitter_url') ? ' has-error' : ''}}'>
                      {!!Form::label('theme_option_twitter_url','Twitter URL',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('theme_option_twitter_url',getOption('theme_option_twitter_url'),['class' => 'form-control','placeholder' => 'Twitter URL','required' => 'true'])!!}
                        @if($errors->has('theme_option_twitter_url'))
                          <span class="help-block">{{$errors->first('theme_option_twitter_url')}}</span>
                        @endif
                      </div>
                    </div>

                    <div class='form-group{{$errors->has('theme_option_instagram_url') ? ' has-error' : ''}}'>
                      {!!Form::label('theme_option_instagram_url','Instagram URL',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('theme_option_instagram_url',getOption('theme_option_instagram_url'),['class' => 'form-control','placeholder' => 'Instagram URL','required' => 'true'])!!}
                        @if($errors->has('theme_option_instagram_url'))
                          <span class="help-block">{{$errors->first('theme_option_instagram_url')}}</span>
                        @endif
                      </div>
                    </div>

                    <div class='form-group{{$errors->has('theme_option_youtube_url') ? ' has-error' : ''}}'>
                      {!!Form::label('theme_option_youtube_url','Youtube URL',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('theme_option_youtube_url',getOption('theme_option_youtube_url'),['class' => 'form-control','placeholder' => 'Youtube URL','required' => 'true'])!!}
                        @if($errors->has('theme_option_youtube_url'))
                          <span class="help-block">{{$errors->first('theme_option_youtube_url')}}</span>
                        @endif
                      </div>
                    </div>
                        <input type="submit" class="btn btn-primary" value="Save">
                    {!!Form::close()!!}
                        
                    </div>                    
                </div>
            </div>
        </div>
	</div>
@stop

@section('footer')   
<script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>">
<script>
    var domain = "{{url('/')}}/admin/rollo-filemanager";
 $('#lfm').filemanager('image', {prefix: domain});
</script>
@endsection
