@extends('layouts.backend.master')
@section('header')
    
@endsection
@section('title')
  Setting
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Setting</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('posts.index')}}">General</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @include('settings.includes.menu')
        <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Akademik Options</h5>                      
                    </div>
                    <div class="ibox-content">
                    {!!Form::open(['route' =>'theme.options.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                        <div class='form-group{{$errors->has('tahun_akademik_aktif') ? ' has-error' : ''}}'>
                          {!!Form::label('tahun_akademik_aktif','Tahun Akademik Aktif',['class' => 'col-sm-4 control-label'])!!}
                          <div class="col-sm-8">
                            {!!Form::text('tahun_akademik_aktif',getOption('tahun_akademik_aktif'),['class' => 'form-control','placeholder' => 'Tahun Akademik Aktif','required' => 'true'])!!}                            
                              <span class="help-block">Pisahkan dengan simbol garis miring (/). contoh : 2017/2018</span>
                          </div>
                        </div>

                        <div class='form-group{{$errors->has('mulai_tahun_akademik') ? ' has-error' : ''}}'>
                          {!!Form::label('mulai_tahun_akademik','Mulai Tahun Akademik',['class' => 'col-sm-4 control-label'])!!}
                          <div class="col-sm-8">
                            {!!Form::text('mulai_tahun_akademik',getOption('mulai_tahun_akademik'),['class' => 'form-control','placeholder' => 'Mulai Tahun Akademik','required' => 'true'])!!}
                            @if($errors->has('mulai_tahun_akademik'))
                              <span class="help-block">{{$errors->first('mulai_tahun_akademik')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class='form-group{{$errors->has('akhir_tahun_akademik') ? ' has-error' : ''}}'>
                          {!!Form::label('akhir_tahun_akademik','Akhir Tahun Akademik',['class' => 'col-sm-4 control-label'])!!}
                          <div class="col-sm-8">
                            {!!Form::text('akhir_tahun_akademik',getOption('akhir_tahun_akademik'),['class' => 'form-control','placeholder' => 'Akhir Tahun Akademik','required' => 'true'])!!}
                            @if($errors->has('akhir_tahun_akademik'))
                              <span class="help-block">{{$errors->first('akhir_tahun_akademik')}}</span>
                            @endif
                          </div>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Save">
                    {!!Form::close()!!}
                        
                    </div>                    
                </div>
            </div>
        </div>
	</div>
@stop

@section('footer')   

<script>
        
    </script>
@endsection
