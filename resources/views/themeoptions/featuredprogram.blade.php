@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Posts
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

                        <div class='form-group{{$errors->has('theme_option_featured_program_amount') ? ' has-error' : ''}}'>
                          {!!Form::label('theme_option_featured_program_amount','Featured Program',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::select('theme_option_featured_program_amount',[1=>1,2=>2,3=>3,4=>4],getOption('theme_option_featured_program_amount'),['class' => 'form-control'])!!}
                            @if($errors->has('theme_option_featured_program_amount'))
                              <span class="help-block">{{$errors->first('theme_option_featured_program_amount')}}</span>
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

<script>
        
    </script>
@endsection
