@extends('layouts.backend.master')
@section('header')
    <link href="{{url('assets/backend')}}/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
@endsection
@section('title')
  Daftar Tagihan
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Daftar Tagihan</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('tagihan.index')}}">Tagihan</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover dataTables-tertagih" >
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BIAYA</th>
                        <th>KEPADA</th>
                        <th>PRESENTER</th>
                        <th>NOMINAL</th>
                        <th>ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tertagih as $tgh)
                    <tr class="gradeX">
                        <td>{{$tgh->id}}</td>
                        <td>{{$tgh->nama_biaya}}</td>
                        <td>{{$tgh->aplikan->nama}} <small>({{$tgh->object_name}})</small></td>
                        <td>{{$tgh->aplikan->presenter->first_name or 'None'}}</td>
                        <td>{{toRp($tgh->nominal)}}</td>
                        <td><a tagihan-id="{{$tgh->id}}" tagihan-nominal="{{$tgh->nominal}}" class="btn btn-xs btn-primary bayarTagihan" data-toggle="modal" href='#bayarTagihan'>Bayar</a></td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                    <tfoot>
                     <tr>
                        <th>NO</th>
                        <th>NAMA BIAYA</th>
                        <th>KEPADA</th>
                        <th>NOMINAL</th>
                    </tr>
                    </tfoot>
                    </table>
            </div>          
        </div>
	</div>   

    
    <div class="modal fade" id="bayarTagihan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Bayar Tagihan</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['class' => 'form-horizontal','route' => 'post.bayar.tagihan'])!!}
                        <div class='form-group{{$errors->has('pembayaran_via_id') ? ' has-error' : ''}}'>
                          {!!Form::label('pembayaran_via_id','Via',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::select('pembayaran_via_id',['1'=> 'Tunai'],old('pembayaran_via_id'),['class' => 'form-control'])!!}
                            @if($errors->has('pembayaran_via_id'))
                              <span class="help-block">{{$errors->first('pembayaran_via_id')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class='form-group{{$errors->has('no_bukti_bayar') ? ' has-error' : ''}}'>
                          {!!Form::label('no_bukti_bayar','No Bukti Bayar',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::text('no_bukti_bayar',old('no_bukti_bayar'),['class' => 'form-control','placeholder' => 'No Bukti Bayar','required' => 'true'])!!}
                            @if($errors->has('no_bukti_bayar'))
                              <span class="help-block">{{$errors->first('no_bukti_bayar')}}</span>
                            @endif
                          </div>
                        </div>

                      <div class='form-group{{$errors->has('label') ? ' has-error' : ''}}'>
                        {!!Form::label('nominal','Nominal',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::text('nominal','',['class' => 'form-control nominal'])!!}
                          @if($errors->has('nominal'))
                            <span class="help-block">{{$errors->first('nominal')}}</span>
                          @endif
                        </div>
                      </div>

                      <div class='form-group{{$errors->has('tgl_bayar') ? ' has-error' : ''}}'>
                        {!!Form::label('tgl_bayar','Tanggal',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::text('tgl_bayar',\Carbon\Carbon::now()->toDateString(),['class' => 'form-control','placeholder' => 'Tanggal','required' => 'true'])!!}
                          @if($errors->has('tgl_bayar'))
                            <span class="help-block">{{$errors->first('tgl_bayar')}}</span>
                          @endif
                        </div>
                      </div>
                      <div class='form-group{{$errors->has('nama_pengirim') ? ' has-error' : ''}}'>
                          {!!Form::label('nama_pengirim','Nama Pengirim',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::text('nama_pengirim',old('nama_pengirim'),['class' => 'form-control','placeholder' => 'Nama Pengirim'])!!}                            
                            <span class="help-block">Diisi Jika Transfer</span>
                            
                          </div>
                        </div>

                        <div class='form-group{{$errors->has('no_rekening_pengirim') ? ' has-error' : ''}}'>
                          {!!Form::label('no_rekening_pengirim','No.Rekening Pengirim',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::text('no_rekening_pengirim',old('no_rekening_pengirim'),['class' => 'form-control','placeholder' => 'No.Rekening Pengirim'])!!}
                            <span class="help-block">Diisi Jika Transfer</span>
                          </div>
                        </div>
                        <div class='form-group{{$errors->has('bank_pengirim') ? ' has-error' : ''}}'>
                          {!!Form::label('bank_pengirim','Bank Pengirim',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::text('bank_pengirim',old('bank_pengirim'),['class' => 'form-control','placeholder' => 'Bank Pengirim'])!!}
                            <span class="help-block">Diisi Jika Transfer</span>
                          </div>
                        </div>  
                        <div class='form-group{{$errors->has('Keterangan') ? ' has-error' : ''}}'>
                          {!!Form::label('Keterangan','Keterangan',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::textarea('Keterangan',old('keterangan'),['class' => 'form-control','placeholder' => 'Keterangan'])!!}
                            @if($errors->has('Keterangan'))
                              <span class="help-block">{{$errors->first('Keterangan')}}</span>
                            @endif
                          </div>
                        </div>

                      <input type="hidden" name="tagihan_id">                      
                </div>
                <div class="modal-footer">                    
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('footer')
<!-- Data Tables -->
    <script src="{{url('assets/backend')}}/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-tertagih').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "{{url('assets/backend')}}/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            $('.bayarTagihan').click(function(){
                var tagihan_id = $(this).attr('tagihan-id');
                var tagihan_nominal = $(this).attr('tagihan-nominal');

                $('input[name="tagihan_id"]').val(tagihan_id);
                $('input[name="nominal"]').val(tagihan_nominal);
            });
            $('.nominal').inputmask({
              'alias': 'numeric', 
              'groupSeparator': '.',
              'autoGroup': true,
              'digits': 0,
              'digitsOptional': false,
              'prefix': 'Rp ',
              'min':0,
              'placeholder': '0',
              'removeMaskOnSubmit':true,
              'rightAlign': false
            });

            $('input[name="tgl_bayar"]').datepicker( {
                format: " yyyy-mm-dd",
                autoclose:true
            });
        });
    </script>
@endsection
