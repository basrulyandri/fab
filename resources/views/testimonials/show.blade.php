@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{$testimonial->name}}</h2>
         <ol class="breadcrumb">
            <li>
                <a href="{{route('testimonials.index')}}">Testimonials</a>
            </li>          
            <li>
                <a href="{{route('testimonials.show',$testimonial)}}">Edit</a>
            </li>          
        </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="{{route('testimonials.edit',$testimonial)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
      </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Detail Testimonial</h5>          
      </div>
      <div class="ibox-content no-padding">
          <table class="table table-striped">
                    <tr>                        
                        <td>id</td>
                        <td>{{$testimonial->id}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>name</td>
                        <td>{{$testimonial->name}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>position_title</td>
                        <td>{{$testimonial->position_title}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>course</td>
                        <td>{{$testimonial->course}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>body</td>
                        <td>{{$testimonial->body}}</td>
                        </tr>
                    </table>
      </div>
  </div>   
</div>

@stop