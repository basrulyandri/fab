@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Add New Page
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Menus</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('menus.index')}}">Menus</a>
                </li>                 
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
       
          {!! \Menu::render() !!}
        </div>
    </div>        
    

@stop

@section('footer')   
<script src="{{url('assets/backend')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>

{!! Menu::scripts() !!}
@endsection
