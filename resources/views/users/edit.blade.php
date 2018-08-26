@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Users
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Edit {{$user->username}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('users.index')}}">Users</a>
                </li> 
                <li class="active">
                    <a href="{{\Request::url()}}">edit</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        
                        <div class="ibox-content">
                            {!!Form::open(['route' =>['user.update','user' => $user], 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                            <div class="box-body">                              

                            <div class='form-group{{$errors->has('first_name') ? ' has-error' : ''}}'>
                              {!!Form::label('first_name','First Name',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::text('first_name',$user->first_name,['class' => 'form-control','placeholder' => 'First Name'])!!}
                                @if($errors->has('first_name'))
                                  <span class="help-block">{{$errors->first('first_name')}}</span>
                                @endif
                              </div>
                            </div>

                            <div class='form-group{{$errors->has('last_name') ? ' has-error' : ''}}'>
                              {!!Form::label('last_name','Last Name',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::text('last_name',$user->last_name,['class' => 'form-control','placeholder' => 'Last Name'])!!}
                                @if($errors->has('last_name'))
                                  <span class="help-block">{{$errors->first('last_name')}}</span>
                                @endif
                              </div>
                            </div>

                            <div class='form-group{{$errors->has('address') ? ' has-error' : ''}}'>
                              {!!Form::label('address','Address',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::textarea('address',$user->address,['class' => 'form-control','placeholder' => 'Address'])!!}
                                @if($errors->has('address'))
                                  <span class="help-block">{{$errors->first('address')}}</span>
                                @endif
                              </div>
                            </div>
                              
                              <div class='form-group{{$errors->has('email') ? ' has-error' : ''}}'>
                                {!!Form::label('email','Email',['class' => 'col-sm-2 control-label'])!!}
                                <div class="col-sm-10">
                                  {!!Form::email('email',$user->email,['class' => 'form-control','placeholder' => 'Email'])!!}
                                  @if($errors->has('email'))
                                    <span class="help-block">{{$errors->first('email')}}</span>
                                  @endif
                                </div>
                              </div>

                              <div class='form-group{{$errors->has('role_id') ? ' has-error' : ''}}'>
                                {!!Form::label('role_id','Role',['class' => 'col-sm-2 control-label'])!!}
                                <div class="col-sm-10">
                                  {!!Form::select('role_id',$roles,$user->role_id,['class' => 'form-control'])!!}
                                  @if($errors->has('role_id'))
                                    <span class="help-block">{{$errors->first('role_id')}}</span>
                                  @endif
                                </div>
                              </div>
                              <div class='form-group{{$errors->has('phone') ? ' has-error' : ''}}'>
                                  {!!Form::label('phone','Phone',['class' => 'col-sm-2 control-label'])!!}
                                  <div class="col-sm-10">
                                    {!!Form::text('phone',$user->phone,['class' => 'form-control','placeholder' => 'Phone','required' => 'true'])!!}
                                    @if($errors->has('phone'))
                                      <span class="help-block">{{$errors->first('phone')}}</span>
                                    @endif
                                  </div>
                              </div>

                              <div class='form-group{{$errors->has('about') ? ' has-error' : ''}}'>
                                  {!!Form::label('about','About User',['class' => 'col-sm-2 control-label'])!!}
                                  <div class="col-sm-10">
                                    {!!Form::textarea('about',$user->about,['class' => 'form-control','placeholder' => 'About User'])!!}
                                    @if($errors->has('about'))
                                      <span class="help-block">{{$errors->first('about')}}</span>
                                    @endif
                                  </div>
                              </div>

                              <div class='form-group{{$errors->has('facebook_url') ? ' has-error' : ''}}'>
                                  {!!Form::label('facebook_url','Facebook URL',['class' => 'col-sm-2 control-label'])!!}
                                  <div class="col-sm-10">
                                    {!!Form::text('facebook_url',$user->facebook_url,['class' => 'form-control','placeholder' => 'Facebook URL'])!!}
                                    @if($errors->has('facebook_url'))
                                      <span class="help-block">{{$errors->first('facebook_url')}}</span>
                                    @endif
                                  </div>
                              </div>

                              <div class='form-group{{$errors->has('twitter_url') ? ' has-error' : ''}}'>
                                  {!!Form::label('twitter_url','Twitter URL',['class' => 'col-sm-2 control-label'])!!}
                                  <div class="col-sm-10">
                                    {!!Form::text('twitter_url',$user->twitter_url,['class' => 'form-control','placeholder' => 'Twitter URL'])!!}
                                    @if($errors->has('twitter_url'))
                                      <span class="help-block">{{$errors->first('twitter_url')}}</span>
                                    @endif
                                  </div>
                              </div>

                              <div class='form-group{{$errors->has('google_plus_url') ? ' has-error' : ''}}'>
                                  {!!Form::label('google_plus_url','Google+ URL',['class' => 'col-sm-2 control-label'])!!}
                                  <div class="col-sm-10">
                                    {!!Form::text('google_plus_url',$user->google_plus_url,['class' => 'form-control','placeholder' => 'Google+ URL'])!!}
                                    @if($errors->has('google_plus_url'))
                                      <span class="help-block">{{$errors->first('google_plus_url')}}</span>
                                    @endif
                                  </div>
                              </div>

                              <div class='form-group{{$errors->has('password') ? ' has-error' : ''}}'>
                                {!!Form::label('password','Password',['class' => 'col-sm-2 control-label'])!!}
                                <div class="col-sm-10">
                                  {!!Form::text('password',old('password'),['class' => 'form-control','placeholder' => 'Password'])!!}
                                  @if($errors->has('password'))
                                    <span class="help-block">{{$errors->first('password')}}</span>
                                  @endif
                                  <span class="help-block">Leave it blank if you don't want to change password.</span>
                                </div>
                              </div>

                            </div><!-- /.box-body -->
                            <div class="box-footer">                              
                              <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div><!-- /.box-footer -->
                          {!!Form::close()!!}
                        </div>
                    </div>
                </div>
        </div>        
    </div>
    
@stop

@section('footer')

@endsection
