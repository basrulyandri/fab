@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  My Courses | {{getOption('web_title')}}
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>My Courses</h2>            
        </div>
        <div class="col-sm-8">

            <div class="title-action">
                <a href="" class="btn btn-info"><i class="fa fa-edit"></i> Add</a>                
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
               
             
            </div>
        </div>
    

@stop

@section('footer')
<script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
$(document).ready(function(){
    var domain = "{{url('/')}}/admin/rollo-filemanager";         
    $('#uploadbutton').filemanager('image', {prefix: domain});     
})

</script>
@endsection
