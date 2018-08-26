@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Aplikan Terbaru
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Data Aplikan</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('aplikan.saya')}}">Aplikan Saya</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{route('aplikan.edit',$aplikan)}}" class="btn btn-warning"><i class="fa fa-edit"> Edit</i></a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
               <div class="ibox-content text-center">
                    <h1>{{$aplikan->nama}}</h1>
                    <div class="m-b-sm">
                            <img alt="image" class="img-circle" src="{{url('assets/backend/img')}}/default-80x80.jpg">
                    </div>
                            <p class="font-bold">No. {{$aplikan->id}}</p>
                            <p class="font-bold">Daftar tanggal {{$aplikan->tanggal_daftar->format('d M Y')}}</p>
                            <small class="text-muted">Status : <strong>{{$aplikan->status->nama}}</strong> {{$aplikan->status_detail}}</small><br>

                    <div class="text-center">
                        <!-- <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                        <a class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> Love</a> -->
                    </div>                    
                </div>
                <ul class="list-group">
                    <li class="list-group-item">Jenis Kelamin <span class="pull-right">{{$aplikan->jenis_kelamin}}</span></li>
                    @if(auth()->user()->isSuperadmin())
                    <li class="list-group-item">TTL <span class="pull-right">{{$aplikan->tempat_lahir}}, {{$aplikan->tanggal_lahir}}</span></li>
                    <li class="list-group-item">Agama <span class="pull-right">{{$aplikan->agama}}</span></li>
                    <li class="list-group-item">Email <span class="pull-right">{{$aplikan->email}}</span></li>
                    <li class="list-group-item">Telepon <span class="pull-right">{{$aplikan->telepon}}</span></li>
                    <li class="list-group-item">Alamat</li>
                    <li class="list-group-item">{{$aplikan->alamat}}, @if($aplikan->domisili) {{$aplikan->domisili->full()}} @endif</li>
                    <li class="list-group-item">Asal Sekolah <span class="pull-right">{{$aplikan->asal_sekolah}}</span></li>
                    <li class="list-group-item">Jurusan Sekolah <span class="pull-right">{{$aplikan->jurusan_sekolah}}</span></li>
                    <li class="list-group-item">Prodi <span class="pull-right">{{($aplikan->konsentrasi) ? $aplikan->konsentrasi->nama : '-'}}</span></li>
                    <li class="list-group-item">Kelas <span class="pull-right">{{($aplikan->kelas) ? $aplikan->kelas->nama : '-'}}</span></li>

                    <li class="list-group-item">Kampus <span class="pull-right">{{($aplikan->pilihanKampus) ? $aplikan->pilihanKampus->nama : '-'}}</span></li>
                    @endif
                </ul>                
                 @if(!in_array($aplikan->status->id,[3,4]))
                    @if(!$aplikan->status_detail)
                        <a class="btn btn-success daftarkan" data-toggle="modal" href='#formDaftarkan' aplikan-id="{{$aplikan->id}}">Daftarkan</a>
                    @endif
                @endif
                @if($aplikan->status->id == 3)                                            
                     <a class="btn btn-success registrasikan" data-toggle="modal" href='#formRegistrasikan' idaplikan="{{$aplikan->id}}">Registrasikan</a>
                @endif
            </div>
            <div class="col-lg-9">
               <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Riwayat</h5>
                                        <div class="ibox-tools">
                                            
                                           </div>
                                    </div>
                                    <div class="ibox-content">
                                        
                                        <div>
                                            @foreach(aplikanHistories($aplikan) as $history)
                                            <div class="feed-activity-list">
                                                
                                                <div class="feed-element">
                                                    <a href="profile.html" class="pull-left">
                                                        <img alt="image" class="img-circle" src="{{url('assets/backend/img')}}/default-80x80.jpg">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">{{$history->pivot->created_at->diffForHumans()}}</small>
                                                        <strong class="text-success">{{$aplikan->nama}}</strong> di {{($history->pivot->getTable() == 'melayani' ? 'layani' : $history->pivot->getTable())}} oleh <a href="#"><strong class="text-success">{{($history->id == auth()->user()->id) ? 'Anda' : $history->first_name}}</strong></a> . <br>
                                                        <small class="text-muted">{{$history->pivot->created_at->format('d M y')}}</small>
                                                        <div class="well">
                                                            {{$history->pivot->keterangan}}
                                                        </div>
                                                        <!-- <div class="pull-right">
                                                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                        </div> -->
                                                    </div>
                                                </div>                                                
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
            </div>
        </div>          
        </div>

        <div class="modal fade" id="formDaftarkan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Daftarkan Aplikan</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['class' => 'form-horizontal','route' => 'post.aplikan.daftarkan'])!!}
                    <input type="hidden" name="aplikan_id" id="aplikanIdDaftarkan">
                    <div class='form-group{{$errors->has('nominal') ? ' has-error' : ''}}'>
                      {!!Form::label('nominal','Nominal',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('nominal',old('nominal'),['class' => 'form-control uang','placeholder' => 'Nominal','required' => 'true'])!!}
                        @if($errors->has('nominal'))
                          <span class="help-block">{{$errors->first('nominal')}}</span>
                        @endif
                      </div>
                    </div>

                    <div class='form-group{{$errors->has('keterangan') ? ' has-error' : ''}}'>
                      {!!Form::label('keterangan','Keterangan',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::textarea('keterangan',old('keterangan'),['class' => 'form-control','placeholder' => 'Keterangan'])!!}
                        @if($errors->has('keterangan'))
                          <span class="help-block">{{$errors->first('keterangan')}}</span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Daftarkan">
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formRegistrasikan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Registrasikan Aplikan</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['class' => 'form-horizontal','route' => 'post.aplikan.registrasikan'])!!}
                    <input type="hidden" name="aplikan_id" id="aplikanIdDaftarkan">
                    <div class='form-group{{$errors->has('nominal') ? ' has-error' : ''}}'>
                      {!!Form::label('nominal','Nominal',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::text('nominal',old('nominal'),['class' => 'form-control uang','placeholder' => 'Nominal','required' => 'true'])!!}
                        @if($errors->has('nominal'))
                          <span class="help-block">{{$errors->first('nominal')}}</span>
                        @endif
                      </div>
                    </div>

                    <div class='form-group{{$errors->has('keterangan') ? ' has-error' : ''}}'>
                      {!!Form::label('keterangan','Keterangan',['class' => 'col-sm-2 control-label'])!!}
                      <div class="col-sm-10">
                        {!!Form::textarea('keterangan',old('keterangan'),['class' => 'form-control','placeholder' => 'Keterangan'])!!}
                        @if($errors->has('keterangan'))
                          <span class="help-block">{{$errors->first('keterangan')}}</span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Registrasikan">
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    
    
@stop

@section('footer')
<script>
    $(document).ready(function(){
        $('.followup').click(function(){
            var aplikan_id = $(this).attr('aplikan-id');
            $('input[id="aplikanIdFollowup"]').val(aplikan_id);
        });
         $('.daftarkan').click(function(){    
            var aplikan_id = $(this).attr('aplikan-id');    
            $('input[id="aplikanIdDaftarkan"]').val(aplikan_id);
            });
         $('.registrasikan').click(function(){
                var aplikan_id = $(this).attr('idaplikan');                
                $('input[id="aplikanIdDaftarkan"]').val(aplikan_id);
            });
        $('.uang').inputmask({
              'alias': 'numeric', 
              'groupSeparator': '.',
              'autoGroup': true,
              'digits': 0,
              'digitsOptional': false,
              'prefix': 'Rp ',
              'placeholder': '0',
              'removeMaskOnSubmit':true,
              'rightAlign': false
            });
    });
</script>
@endsection
