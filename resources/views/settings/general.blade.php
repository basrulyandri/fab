@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Setting
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Setting</h2>
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
        @include('settings.includes.menu')
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>General Options</h5>                      
                    </div>
                    <div class="ibox-content">
                    {!!Form::open(['route' =>'theme.options.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                    
                        
                        
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
