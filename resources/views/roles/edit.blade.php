@extends('layouts.backend.master')
@section('header')
  <link href="{{url('assets/backend')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
@endsection
@section('title')
  Edit Role
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Edit Role</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('roles.index')}}">Roles</a>
                </li>
                <li class="active">
                    <a href="{{route('role.edit',['id'=>$role->id])}}">Edit</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">                    
                    <div class="ibox-content ibox-heading">
                    {!!Form::open(['route' => ['role.update',$role->id],'class' => 'form-horizontal'])!!}
                    
                        <div class='form-group{{$errors->has('name') ? ' has-error' : ''}}'>
                            {!!Form::label('name','Name',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::text('name',$role->name,['class' => 'form-control','placeholder' => 'Name','required' => 'true'])!!}
                              @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                              @endif
                            </div>
                        </div>                        
                    </div>
                    <div class="ibox-content">

                        @foreach($allpermissions as $perm)
                        <div class="checkbox">
                        <label for="">
                        <input name="perms[]" type="checkbox" class="i-check" value="{{$perm->id}}" @if(in_array($perm->name_permission,$rolepermissions->toArray())) checked @endif> {{$perm->name_permission}} ({{$perm->label}})                        
                        </label>
                        </div>
                        @endforeach                    
                    <input type="submit" class="btn btn-primary pull-right" value="Save">
                    {!!Form::close()!!}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('footer')
    <script src="{{url('assets/backend')}}/js/plugins/iCheck/icheck.min.js"></script>
    <script>        
        $(document).ready(function () {
           //  $('.ibox-content').iCheck({
           //      checkboxClass: 'icheckbox_square-green',                                      
           //  });

           // $('input.i-checks').on('ifChecked', function(event){
           //  $(this).attr('checked',true);
           //    console.log($(this));
           //  });

            // $('.i-checks').on('ifChecked', function(event){
            //   $(this).attr('checked');
            // });
        });
        
    </script>
@endsection
