@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Add Role
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Add Roles</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('roles.index')}}">Roles</a>
                </li>                
                <li class="active">
                    <a href="{{route('role.add')}}">Add</a>
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
                {!!Form::open(['route' => 'role.create','class' => 'form-horizontal'])!!}
        <div class="row">
            <div class="col-md-12">
                    <div class='form-group{{$errors->has('name') ? ' has-error' : ''}}'>
                        {!!Form::label('name','Name',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::text('name',old('name'),['class' => 'form-control','placeholder' => 'Name','required' => 'true'])!!}
                          @if($errors->has('name'))
                            <span class="help-block">{{$errors->first('name')}}</span>
                          @endif
                        </div>
                    </div>                    
            </div>            
            <div class="col-md-10 col-md-offset-2">
                <h3>Attach Role to Permissions below</h3>
                @foreach($allpermissions as $perm)
                    <div class="checkbox">
                        <label for="">
                        <input name="perms[]" type="checkbox" class="i-check" value="{{$perm->id}}" > {{$perm->name_permission}} ({{$perm->label}})                        
                        </label>
                    </div>
                    @endforeach
                    <input type="submit" class="btn btn-primary pull-right" value="Save">
            </div>
        </div>
            {!!Form::close()!!}
    </div>
    
@stop

@section('footer')
 
@endsection
