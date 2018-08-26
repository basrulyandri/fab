@extends('layouts.backend.master')
@section('header')
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
  <link href="{{url('assets/backend')}}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
@endsection
@section('title')
  Tambah Aplikan Baru
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Tambah Aplikan Baru</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('aplikan.all')}}">Aplikan</a>
                </li> 
                <li class="active">
                    <a href="{{\Request::url()}}">Tambah</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a class="btn btn-primary" data-toggle="modal" href='#importAplikan'><i class="fa fa-file-excel-o"></i> Import</a>
                
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">                            
                            <h5>Data Diri</h5>
                        </div>
                        <div class="ibox-content">
                            {!!Form::open(['route' =>'post.aplikan.add', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                            <div class="box-body">
                              <div class='form-group{{$errors->has('nama') ? ' has-error' : ''}}'>
                                {!!Form::label('nama','Nama',['class' => 'col-sm-2 control-label'])!!}
                                <div class="col-sm-10">
                                  {!!Form::text('nama',old('nama'),['class' => 'form-control','placeholder' => 'Nama','required' => 'true'])!!}
                                  @if($errors->has('nama'))
                                    <span class="help-block">{{$errors->first('nama')}}</span>
                                  @endif
                                </div>
                              </div>

                            <div class='form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}'>
                              {!!Form::label('jenis_kelamin','Jenis Kelamin',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::select('jenis_kelamin',[''=> 'Pilih Jenis Kelamin','P' => 'Pria','W' => 'Wanita'],old('jenis_kelamin'),['class' => 'form-control'])!!}
                                @if($errors->has('jenis_kelamin'))
                                  <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                @endif
                              </div>
                            </div>

                            <div class='form-group{{$errors->has('tempat_lahir') ? ' has-error' : ''}}'>
                              {!!Form::label('tempat_lahir','Tempat Lahir',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::text('tempat_lahir',old('tempat_lahir'),['class' => 'form-control','placeholder' => 'Tempat Lahir','required' => 'true'])!!}
                                @if($errors->has('tempat_lahir'))
                                  <span class="help-block">{{$errors->first('tempat_lahir')}}</span>
                                @endif
                              </div>
                            </div>

                            <div class='form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}'>
                              {!!Form::label('tanggal_lahir','Tanggal Lahir',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::text('tanggal_lahir',old('tanggal_lahir'),['class' => 'form-control','placeholder' => 'Tanggal Lahir','required' => 'true','id' => 'tanggalLahir'])!!}
                                @if($errors->has('tanggal_lahir'))
                                  <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                                @endif
                              </div>
                            </div>

                            <div class='form-group{{$errors->has('agama') ? ' has-error' : ''}}'>
                              {!!Form::label('agama','Agama',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::text('agama',old('agama'),['class' => 'form-control','placeholder' => 'Agama','required' => 'true'])!!}
                                @if($errors->has('agama'))
                                  <span class="help-block">{{$errors->first('agama')}}</span>
                                @endif
                              </div>
                            </div>

                            <div class='form-group{{$errors->has('email') ? ' has-error' : ''}}'>
                              {!!Form::label('email','Email',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::email('email',old('email'),['class' => 'form-control','placeholder' => 'Email','required' => 'true'])!!}
                                @if($errors->has('email'))
                                  <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                              </div>
                            </div>

                            <div class='form-group{{$errors->has('telepon') ? ' has-error' : ''}}'>
                              {!!Form::label('telepon','Telpon',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::text('telepon',old('telepon'),['class' => 'form-control','placeholder' => 'Telpon','required' => 'true'])!!}
                                @if($errors->has('telepon'))
                                  <span class="help-block">{{$errors->first('telepon')}}</span>
                                @endif
                              </div>
                            </div>  
                            <div class='form-group{{$errors->has('village_id') ? ' has-error' : ''}}'>
                              {!!Form::label('domisili','Domisili',['class' => 'col-sm-2 control-label','id'=>'formTambahAplikan'])!!}
                              <div class="col-sm-10">
                                {!!Form::text('domisili',old('domisili'),['class' => 'form-control','placeholder' => 'Ketik nama Kelurahan atau Kecamatan atau Kabupaten atau Provinsi','id' => 'domisili','required' => 'true'])!!}
                                @if($errors->has('village_id'))
                                  <span class="help-block">{{$errors->first('village_id')}}</span>
                                @endif
                              </div>
                            </div>
                            <input type="hidden" name="village_id" value="{{old('village_id')}}">
                            <div class='form-group{{$errors->has('alamat') ? ' has-error' : ''}}'>
                              {!!Form::label('alamat','Alamat',['class' => 'col-sm-2 control-label'])!!}
                              <div class="col-sm-10">
                                {!!Form::textarea('alamat',old('alamat'),['class' => 'form-control','placeholder' => 'Alamat'])!!}
                                @if($errors->has('alamat'))
                                  <span class="help-block">{{$errors->first('alamat')}}</span>
                                @endif
                              </div>
                            </div>
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">                            
                            <h5>Data Sekolah</h5>
                        </div>
                        <div class="ibox-content form-horizontal">
                          <div class='form-group{{$errors->has('asal_sekolah') ? ' has-error' : ''}}'>
                            {!!Form::label('asal_sekolah','Asal Sekolah',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::text('asal_sekolah',old('asal_sekolah'),['class' => 'form-control','placeholder' => 'Asal Sekolah','required' => 'true'])!!}
                              @if($errors->has('asal_sekolah'))
                                <span class="help-block">{{$errors->first('asal_sekolah')}}</span>
                              @endif
                            </div>
                          </div>

                          <div class='form-group{{$errors->has('jurusan_sekolah') ? ' has-error' : ''}}'>
                            {!!Form::label('jurusan_sekolah','Jurusan Sekolah',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::text('jurusan_sekolah',old('jurusan_sekolah'),['class' => 'form-control','placeholder' => 'Jurusan Sekolah','required' => 'true'])!!}
                              @if($errors->has('jurusan_sekolah'))
                                <span class="help-block">{{$errors->first('jurusan_sekolah')}}</span>
                              @endif
                            </div>
                          </div>                         
                        </div>
                    </div>

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">                            
                            <h5>Data Pilihan Perguruan Tinggi</h5>
                        </div>
                        <div class="ibox-content form-horizontal">                          
                          <div class='form-group{{$errors->has('konsentrasi_id') ? ' has-error' : ''}}'>
                            {!!Form::label('konsentrasi_id','Jurusan',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::select('konsentrasi_id',$konsentrasi->pluck('nama','id'),old('konsentrasi_id'),['class' => 'form-control'])!!}
                              @if($errors->has('konsentrasi_id'))
                                <span class="help-block">{{$errors->first('konsentrasi_id')}}</span>
                              @endif
                            </div>
                          </div>

                          <div class='form-group{{$errors->has('kelas_id') ? ' has-error' : ''}}'>
                            {!!Form::label('kelas_id','Kelas',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::select('kelas_id',$kelasOptions,old('kelas_id'),['class' => 'form-control'])!!}
                              @if($errors->has('kelas_id'))
                                <span class="help-block">{{$errors->first('kelas_id')}}</span>
                              @endif
                            </div>
                          </div>

                          <div class='form-group{{$errors->has('pilihan_kampus_id') ? ' has-error' : ''}}'>
                            {!!Form::label('pilihan_kampus_id','Pilihan Kampus',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::select('pilihan_kampus_id',$pilihanKampusOptions,old('pilihan_kampus_id'),['class' => 'form-control'])!!}
                              @if($errors->has('pilihan_kampus_id'))
                                <span class="help-block">{{$errors->first('pilihan_kampus_id')}}</span>
                              @endif
                            </div>
                          </div>

                          <div class='form-group{{$errors->has('sumber_informasi') ? ' has-error' : ''}}'>
                            {!!Form::label('sumber_informasi','Sumber Informasi',['class' => 'col-sm-2 control-label'])!!}
                            <div class="col-sm-10">
                              {!!Form::text('sumber_informasi',old('sumber_informasi'),['class' => 'form-control','placeholder' => 'Sumber Informasi','required' => 'true'])!!}
                              @if($errors->has('sumber_informasi'))
                                <span class="help-block">{{$errors->first('sumber_informasi')}}</span>
                              @endif
                            </div>
                          </div>

                        </div>

                    </div>

                  </div>
        </div>     
        <div class="row">
          <button type="submit" class="btn btn-info pull-right">Save</button>                            
                          {!!Form::close()!!}
        </div>   
    </div>
    

    <div class="modal fade" id="importAplikan">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Import Data Aplikan</h4>
                      </div>
                      <div class="modal-body">
                        {!!Form::open(['route' =>'aplikan.saya.import', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                        <div class='form-group{{$errors->has('file') ? ' has-error' : ''}}'>
                          {!!Form::label('file','File Excel',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::input('file','file',old('file'),['class' => 'form-control','placeholder' => 'File Excel','required' => 'true'])!!}
                            @if($errors->has('file'))
                              <span class="help-block">{{$errors->first('file')}}</span>
                            @endif
                          </div>
                        </div>

                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong>Catatan !</strong> 
                          <br>file yang dimport berupa CSV. Data harus ada adalah <b>Nama, Jenis Kelamin, email dan telpon.</b>
                        </div>

                        <a class="btn btn-sm btn-primary" target="_blank" href="{{url('import-aplikan-example.csv')}}">Download Contoh File CSV</a>
                      </div>


                      <div class="modal-footer">                        
                        <input type="submit" class="btn btn-primary" value="Import">
                        {!!Form::close()!!}
                      </div>
                    </div>
                  </div>
                </div>
@stop

@section('footer')
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
  $("#domisili" ).autocomplete({
      source: "{{route('search.wilayah')}}",
      minLength: 2,
      select: function( event, ui ) {
        $('input[name="village_id"]').val(ui.item.id);
        $('input[name="domisili"]').val(ui.item.value);
        return false;
      }
    });
  $('input[name="domisili"]').on('change', function () {
       $('input[name="village_id"]').val('');
    });
  $('#tanggalLahir').datepicker({
                format : 'yyyy-mm-dd',                
                todayBtn: "linked",                
                autoclose: true
            });
});
</script>
@endsection
