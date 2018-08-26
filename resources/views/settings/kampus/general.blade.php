@extends('layouts.backend.master')
@section('header')
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
  <link href="{{url('assets/backend')}}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
@endsection
@section('title')
  Pengaturan Kampus
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Pengaturan Kampus</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('settings.kampus.general')}}">Umum</a>
                </li>                 
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      @include('includes.menusettingkampus')
        <div class="row">
            <div class="col-lg-6">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">                            
                      <h5>Pengaturan Umum</h5>
                  </div>
                  <div class="ibox-content">
                      {!!Form::open(['route' =>'post.settings.kampus.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                      <div class='form-group{{$errors->has('nama_institusi') ? ' has-error' : ''}}'>
                        {!!Form::label('nama_institusi','Nama Institusi',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::text('nama_institusi',getPtOption('nama_institusi'),['class' => 'form-control','placeholder' => 'Nama Institusi','required' => 'true'])!!}
                          @if($errors->has('nama_institusi'))
                            <span class="help-block">{{$errors->first('nama_institusi')}}</span>
                          @endif
                        </div>
                      </div>
                      
                  </div><!-- /.box-body -->
              </div>
            </div>
        </div>

        <div class="row">
          <button type="submit" class="btn btn-info pull-right">Save</button>                            
          {!!Form::close()!!}
        </div>   
    </div>
    
@stop

@section('footer')
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){    
  $('#tanggalLahir').datepicker({
                format : 'yyyy-mm-dd',                
                todayBtn: "linked",                
                autoclose: true
            });
});
</script>
@endsection
