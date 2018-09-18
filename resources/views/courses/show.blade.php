@extends('layouts.backend.master')
@section('title')
  Course Detail | {{$course->title}}
@stop
@section('content')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Courses</h2>
         <ol class="breadcrumb">
            <li>
                <a href="{{route('courses.index')}}">Courses</a>
            </li>          
            <li>
                <a href="{{route('courses.show',$course)}}">Edit</a>
            </li>          
        </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="{{route('courses.edit',$course)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
      </div>
    </div>
</div>
<div class="wrapper wrapper-content">
  <div class="col-md-6">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Course Detail</h5>          
      </div>
      <div class="ibox-content no-padding">
          <table class="table table-striped">            
            <tr>                        
                <td>title</td>
                <td>{{$course->title}}</td>
                </tr>
            
            <tr>                        
                <td>description</td>
                <td>{!!$course->description!!}</td>
                </tr>
            
            <tr>                        
                <td>slug</td>
                <td>{{$course->slug}}</td>
            </tr>
          </table>
      </div>
    </div>   
  </div>

  <div class="col-md-6">
  <div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Course Items</h5> 
          <a href="#" class="btn btn-xs btn-primary pull-right">Add Item</a>         
      </div>
      <div class="ibox-content no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Title</th>                
              </tr>
            </thead>
            <tbody>
              @foreach($course->items as $item)
              <tr>
                <td><a href="{{route('courseitems.show',$item)}}">{{$item->title}}</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>  
      </div>
    </div>   
  </div>

</div>

@stop