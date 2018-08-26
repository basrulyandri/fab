@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Edit Permission 
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Edit Permission</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('permissions.index')}}">Roles</a>
                </li>                
                <li class="active">
                    <a href="{{route('permission.edit',['id' => $permission->id])}}">Edit</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('role.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Role</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                {!!Form::open(['route' => ['permission.update', $permission],'class' => 'form-horizontal','method' => 'POST'])!!}

                <div class='form-group{{$errors->has('label') ? ' has-error' : ''}}'>
                    {!!Form::label('label','Label',['class' => 'col-sm-2 control-label'])!!}
                    <div class="col-sm-10">
                      {!!Form::text('label',$permission->label,['class' => 'form-control','placeholder' => 'Label','required' => 'true'])!!}
                      @if($errors->has('label'))
                        <span class="help-block">{{$errors->first('label')}}</span>
                      @endif
                    </div>
                </div>
                    <div class='form-group{{$errors->has('name') ? ' has-error' : ''}}'>
                        {!!Form::label('name_permission','Name',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::text('name_permission',$permission->name_permission,['class' => 'form-control','placeholder' => 'Name of Permission','required' => 'true'])!!}
                          @if($errors->has('name_permission'))
                            <span class="help-block">{{$errors->first('name_permission')}}</span>
                          @endif
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary pull-right" value="Save">
                {!!Form::close()!!}
            </div>
        </div>
    </div>
    
@stop

@section('footer')
 
@endsection
