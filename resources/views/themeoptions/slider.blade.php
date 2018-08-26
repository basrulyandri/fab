@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Slider | Theme Options
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Theme Options</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('posts.index')}}">Slider</a>
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
                        <h5>General Options</h5>                      
                    </div>
                    <div class="ibox-content">
                    {!!Form::open(['route' =>'theme.options.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                        
                        <div class='form-group{{$errors->has('theme_option_amount_of_slider') ? ' has-error' : ''}}'>
                          {!!Form::label('theme_option_amount_of_slider','Amount of Sliders',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::input('number','theme_option_amount_of_slider',getOption('theme_option_amount_of_slider'),['class' => 'form-control','placeholder' => 'Amount of Sliders','required' => 'true'])!!}
                            @if($errors->has('theme_option_amount_of_slider'))
                              <span class="help-block">{{$errors->first('theme_option_amount_of_slider')}}</span>
                            @endif
                          </div>
                        </div>
                        <hr>
                        <div class="col-lg-10 col-lg-offset-2">                            
                            <h4>Choose content below to display as Slider :</h4>

                            @foreach(postsAndPages() as $p)
                             <label><input type="checkbox" name="theme_option_slider_contents[]" value="{{$p->id}}" 
                             @if(in_array($p->id,$slider_contents)) 
                             checked 
                             @endif> {{$p->title}} <small>({{$p->type}})</small></label>
                            @endforeach

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
