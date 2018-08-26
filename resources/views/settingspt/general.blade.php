@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Pengaturan
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pengaturan</h2>
            <ol class="breadcrumb">
                <li class="active">
                    
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">                        
                        <h5>Jenis Pengaturan</h5>                        
                    </div>
                    <div class="ibox-content">
                        <div class="list-group">                            
                            <a class="list-group-item" href="{{route('settingspt.general')}}">Umum</a>
                            <a class="list-group-item" href="{{route('settingspt.prodi')}}">Fakultas dan Prodi</a> 
                        </div>
                    </div>
                </div>
            </div>          
            <div class="col-lg-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">                        
                        <h5>Pengaturan Umum</h5>                        
                    </div>
                    <div class="ibox-content">
                        {!!Form::open(['class' => 'form-horizontal','route' => 'post.settingspt.update'])!!}
                            <div class='form-group{{$errors->has('bentuk_pt') ? ' has-error' : ''}}'>
                              {!!Form::label('bentuk_pt','Bentuk PT',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::select('bentuk_pt',getOption('bentuk_pt',true),getPtOption('bentuk_pt'),['class' => 'form-control'])!!}
                                @if($errors->has('bentuk_pt'))
                                  <span class="help-block">{{$errors->first('bentuk_pt')}}</span>
                                @endif
                              </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="Simpan">
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>          
        </div>
	</div>
@stop

@section('footer')
    <script>
        $(document).ready(function(){
            
        });
    </script>
@endsection
