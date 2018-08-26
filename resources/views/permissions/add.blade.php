@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Add Permissions
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Add Permission</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('permissions.index')}}">Permissions</a>
                </li>
                <li class="active">
                    <a href="{{route('permission.add')}}">Add</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('permission.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add Permission</a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                {!!Form::open(['class' => 'form-horizontal','route' => 'permission.create'])!!}
              
                  <div class='form-group{{$errors->has('label') ? ' has-error' : ''}}'>
                    {!!Form::label('label','Label',['class' => 'col-sm-2 control-label'])!!}
                    <div class="col-sm-10">
                      {!!Form::text('label',old('label'),['class' => 'form-control'])!!}
                      @if($errors->has('label'))
                        <span class="help-block">{{$errors->first('label')}}</span>
                      @endif
                    </div>
                  </div>

                  <div class='form-group{{$errors->has('name_permission') ? ' has-error' : ''}}'>
                    {!!Form::label('name_permission','Name',['class' => 'col-sm-2 control-label'])!!}
                    <div class="col-sm-10">
                      {!!Form::text('name_permission',old('name_permission'),['class' => 'form-control'])!!}
                      @if($errors->has('label'))
                        <span class="help-block">{{$errors->first('name_permission  ')}}</span>
                      @endif
                    </div>
                  </div>

                  
            </div>

            <div class="col-md-10 col-md-offset-2">
                <h3>Attach Permission to Roles below</h3>
                @foreach($roles as $role)
                    <div class="checkbox">
                        <label for="">
                        <input name="roles[]" type="checkbox" class="i-check" value="{{$role->id}}" > {{$role->name}} 
                        </label>
                    </div>
                    @endforeach
                    
            </div>

            <div class="row">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-primary pull-right" value="Save">
                {!!Form::close()!!}
              </div>
            </div>
            </div>
	</div>
@stop

@section('footer')
    
@endsection
