@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Import Aplikan
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Import Aplikan</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('aplikan.saya')}}">Aplikan Saya</a>
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
        <div class="col-md-2">
            <div class="ibox float-e-margins">                    
                <div class="ibox-content">
                @if($isDataValid)                

                <div class="widget red-bg p-lg text-center">
                    <div class="m-b-md">                        
                        <h1 class="m-xs">{{$counter_data_baru}}</h1>
                        <h3 class="font-bold no-margins">
                            Data Baru
                        </h3>
                        <small>yang akan dimasukkan</small>
                    </div>
                </div>
                 {!!Form::open(['route' => 'aplikan.saya.import.konfirmasi','class' => 'form-horizontal','method' => 'POST'])!!}
                    <input type="hidden" name="data_baru" value="{{$data_dikirim_konfirmasi->toJson()}}">            
                    <input type="submit" class="btn btn-success btn-block" value="Oke, Konfirmasi">
                {!!Form::close()!!}

                @else
                    <div class="alert alert-danger">
                        Data Belum valid, Masih ada<strong>Email</strong> yang kosong.                       
                    </div>

                    <a class="btn btn-primary" data-toggle="modal" href='#importAnggota'>Import Ulang</a>
                        <div class="modal fade" id="importAnggota">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Import Data Aplikan</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!!Form::open(['route' => 'aplikan.saya.import','class' => 'form-horizontal','method' => 'POST','enctype' => 'multipart/form-data'])!!}
                                            <div class='form-group{{$errors->has('file') ? ' has-error' : ''}}'>
                                              {!!Form::label('file','File Excel',['class' => 'col-sm-2 control-label'])!!}
                                              <div class="col-sm-10">
                                                {!!Form::input('file','file',old('file'),['class' => 'form-control','placeholder' => 'File Excel','required' => 'true'])!!}                                            
                                              </div>
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Import">
                                        {!!Form::close()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
                </div>
            </div>
        </div>     
        <div class="col-lg-10">
                <div class="ibox float-e-margins">                    
                    <div class="ibox-content">
                        <h3>Data Aplikan Baru:</h3>
                        <table class="table table-striped" id="datatables">
                            <thead>
                            <tr>                                
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>                                                                
                                <th>Email</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                                <th>Asal Sekolah</th>
                                <th>Jurusan Sekolah</th>
                                <th>Sumber Informasi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;?>
                            @foreach($data_baru as $b)
                                <?php $data_lama = \App\Aplikan::whereEmail($b->email)->first();?>
                                @if(!$data_lama)                                    
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$b->nama}}</td>                           
                                            <td><span class="line">{{$b->jenis_kelamin}}</span></td>
                                            <td>{{$b->tempat_lahir}}</td>       
                                            <td>{{$b->tanggal_lahir}}</td> 
                                            <td>{{$b->agama}}</td>
                                            <td>{{$b->email}}</td>
                                            <td>{{$b->telpon}}</td>
                                            <td>{{$b->alamat}}</td>
                                            <td>{{$b->asal_sekolah}}</td>
                                            <td>{{$b->jurusan_sekolah}}</td>
                                            <td>{{$b->sumber_informasi}}</td>
                                        </tr>                                        
                                @endif
                                <?php $no++;?>
                            @endforeach
                            </tbody>
                        </table>
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
