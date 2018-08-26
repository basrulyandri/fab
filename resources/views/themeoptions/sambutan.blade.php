@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Theme Option Sambutan
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
                    <div class="ibox-title">
                        <h5>Featured Program Options</h5>                      
                    </div>
                    <div class="ibox-content">
                    {!!Form::open(['route' =>'theme.options.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                        <div class="form-group">
                            {!!Form::label('theme_option_sambutan_image','Foto',['class' => 'col-sm-2 control-label','style' => 'margin-top: 40px;'])!!}
                            <div class="col-sm-6" style="margin-top: 40px;">
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="uploadbutton" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                       <i class="fa fa-picture-o"></i> Choose
                                     </a>
                                   </span>
                                   <input id="thumbnail" class="form-control" type="text" name="theme_option_sambutan_image" value="{{getOption('theme_option_sambutan_image')}}">
                                 </div>        
                                <span class="help-block">Ukuran ideal 590 x 393 px</span>
                            </div>

                            <div class="col-sm-2">
                                <img src="{{url('/')}}{{getOption('theme_option_sambutan_image')}}" id="holder" style="margin:0;width:100%">          
                            </div>
                        </div>
                        
                        <div class='form-group{{$errors->has('theme_option_sambutan_nama') ? ' has-error' : ''}}'>
                          {!!Form::label('theme_option_sambutan_nama','Nama Ketua',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::text('theme_option_sambutan_nama',getOption('theme_option_sambutan_nama'),['class' => 'form-control','placeholder' => 'Nama Ketua','required' => 'true'])!!}
                            @if($errors->has('theme_option_sambutan_nama'))
                              <span class="help-block">{{$errors->first('theme_option_sambutan_nama')}}</span>
                            @endif
                          </div>
                        </div>
                        

                        <div class='form-group{{$errors->has('theme_option_sambutan_title') ? ' has-error' : ''}}'>
                          {!!Form::label('theme_option_sambutan_title','Judul',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::text('theme_option_sambutan_title',getOption('theme_option_sambutan_title'),['class' => 'form-control','placeholder' => 'Judul','required' => 'true'])!!}
                            @if($errors->has('theme_option_sambutan_title'))
                              <span class="help-block">{{$errors->first('theme_option_sambutan_title')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class='form-group{{$errors->has('theme_option_sambutan_content') ? ' has-error' : ''}}'>
                          {!!Form::label('theme_option_sambutan_content','Isi Sambutan',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::textarea('theme_option_sambutan_content',getOption('theme_option_sambutan_content'),['class' => 'form-control','placeholder' => 'Isi Sambutan','required' => 'true'])!!}
                            @if($errors->has('theme_option_sambutan_content'))
                              <span class="help-block">{{$errors->first('theme_option_sambutan_content')}}</span>
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
<script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
        $(document).ready(function(){
            var domain = "{{url('/')}}/admin/rollo-filemanager";         
            $('#uploadbutton').filemanager('image', {prefix: domain});
        });
    </script>
@endsection
