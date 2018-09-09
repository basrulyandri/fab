@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Course Item</h2>
         <ol class="breadcrumb">
            <li>
                <a href="{{route('courseitems.index')}}">Courseitems</a>
            </li>          
            <li>
                <a href="{{route('courseitems.show',$courseitem)}}">Edit</a>
            </li>          
        </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="{{route('courseitems.edit',$courseitem)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
      </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Detail Courseitem</h5>          
      </div>
      <div class="ibox-content no-padding">
          <table class="table table-striped">
                    <tr>                        
                        <td>id</td>
                        <td>{{$courseitem->id}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>title</td>
                        <td>{{$courseitem->title}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>description</td>
                        <td>{{$courseitem->description}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>course_id</td>
                        <td>{{$courseitem->course_id}}</td>
                        </tr>
                    </table>
      </div>
  </div>   
</div>

@stop