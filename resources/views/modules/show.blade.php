@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{{$module->name}}</h2>
         <ol class="breadcrumb">
            <li>
                <a href="{{route('modules.index')}}">Modules</a>
            </li>          
            <li>
                <a href="{{route('modules.show',$module)}}">Edit</a>
            </li>          
        </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="{{route('modules.edit',$module)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
      </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Detail Module</h5>          
      </div>
      <div class="ibox-content no-padding">
          <table class="table table-striped">
                    <tr>                        
                        <td>id</td>
                        <td>{{$module->id}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>title</td>
                        <td>{{$module->title}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>description</td>
                        <td>{{$module->description}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>courseitem_id</td>
                        <td>{{$module->courseitem_id}}</td>
                        </tr>
                    
                    <tr>                        
                        <td>datetime</td>
                        <td>{{$module->datetime}}</td>
                        </tr>
                    </table>
      </div>
  </div>   
</div>

@stop