@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Daftar Semua Aplikan
@stop

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Daftar Semua Aplikan</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('aplikan.all')}}">Semua Aplikan</a>
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
                        <div class="row">
                            <div class="col-md-4">
                            <form class="form-horizontal">                                
                                    <input type="text" name="nama" placeholder="Cari Nama Aplikan" value="{{$request->nama or ''}}" class="input-sm form-control">                            
                            </div>
                            <div class="col-md-3 form-horizontal">
                                {!!Form::select('aplikan_status_id',[''=>'Filter aplikan berdasarkan status',2=>'Aplikan',3=>'Daftar',4=>'Registrasi'],old('status_id'),['class' => 'form-control','id' => 'filterStatus'])!!}
                            </div>
                            <div class="col-md-1">
                                        <button type="submit" class="btn btn-sm btn-primary"> Go!</button>
                                </form>                                
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <hr>
                        <div>
                            <div class="feed-activity-list">
                                @if($aplikan->isEmpty())
                                    <div class="feed-element">
                                    <div class="alert alert-warning">                                        
                                        <strong>Data Aplikan tidak ditemukan</strong>                                    
                                    </div>
                                    </div>
                                @endif

                                @foreach($aplikan as $apl)
                                <div class="feed-element">
                                    <a href="{{route('aplikan.detail',$apl)}}" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{url('assets/backend/img')}}/default.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">                                            
                                            @if($apl->status->id < 4)
                                            <a idaplikan="{{$apl->id}}" class="btn btn-sm btn-warning melayani" data-toggle="modal" href='#formLayani'>Layani</a>
                                            @endif
                                            @if(!in_array($apl->status->id,[3,4]))
                                                @if(!$apl->status_detail)
                                                    <a class="btn btn-sm btn-success daftarkan" data-toggle="modal" href='#formDaftarkan' idaplikan="{{$apl->id}}" idpresenter="{{$apl->presenter->id or ''}}">Daftarkan</a>
                                                @endif
                                            @endif
                                            @if($apl->status->id == 3 && $apl->status_detail != 'proses-registrasi')  
                                                <a class="btn btn-sm btn-primary registrasikan" data-toggle="modal" href='#formRegistrasikan' idpresenter="{{$apl->takenBy->id or ''}}" idaplikan="{{$apl->id}}" nama_presenter_pendaftar="{{$apl->trackUser()->wherePivot('nama_proses','pendaftaran')->first()->first_name or ''}}">Registrasikan</a>
                                            @endif
                                        </small>                                        
                                        <strong><a href="{{route('aplikan.detail',$apl)}}">{{$apl->nama}}</a></strong>                                        
                                        @if($apl->hasBeenTaken()) 
                                        di take oleh <strong>{{$apl->takenBy->first_name}}</strong>. 
                                        @endif
                                        <br>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="well">
                                                    <small class="text-muted">Status : <strong>{{$apl->status->nama}}</strong> {{$apl->status_detail}}</small><br>
                                        <small class="text-muted">{{$apl->alamatLengkap()}}</small>
                                        <div class="actions">
                                            {{$apl->tanggal_daftar->diffForHumans()}}
                                        </div>
                                                </div>                                            
                                            </div>
                                            <div class="col-sm-6">
                                                <ul class="list-unstyled project-files">
                                                    <li><i class="fa fa-clock-o text-{{($apl->isFresh() ? 'info': 'warning')}}"></i> {{$apl->tanggal_daftar->diffForHumans()}}</a></li>
                                                    @if($apl->hasBeenTakenBefore())
                                                        <li><i class="fa fa-frown-o text-warning"></i> Sudah Pernah di Take</li>
                                                    @else
                                                        <li><i class="fa fa-smile-o text-info"></i> Belum Pernah di Take</li>
                                                    @endif
                                                    <li><i class="fa fa-circle"></i> {{$apl->jmlFollowedUp() >= 1 ? $apl->jmlFollowedUp().' Kali di follow up' : 'Blm di follow up'}}</li>
                                                    <li><i class="fa fa-circle"></i> {{$apl->jmlDilayani() >= 1 ? $apl->jmlDilayani().' Kali di layani' : 'Blm pernah di layani'}}</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>                   
                                @endforeach             
                            </div>
                            {{$aplikan->appends(['nama' => $request->nama])->links()}}                            

                        </div>

                    </div>
                </div>
            </div>          
        </div>
    </div>

    
    <div class="modal fade" id="formLayani">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Form Melayani Aplikan</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['class' => 'form-horizontal','route' => 'post.user.melayani.aplikan'])!!}
              
                      <div class='form-group{{$errors->has('label') ? ' has-error' : ''}}'>
                        {!!Form::label('hasil','Hasil Melayani Aplikan',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::textarea('keterangan',old('keterangan'),['class' => 'form-control'])!!}
                          @if($errors->has('keterangan'))
                            <span class="help-block">{{$errors->first('keterangan')}}</span>
                          @endif
                        </div>
                      </div>
                      <input type="hidden" name="aplikan_id" id="aplikanIdMelayani">
                </div>
                <div class="modal-footer">                    
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    {!!Form::close()!!}
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
                <span id="alertDaftarkan" class="help-block text-center text-danger"></span>
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

                    @if(auth()->user()->isKeuangan())
                        <div class='form-group{{$errors->has('presenter_id') ? ' has-error' : ''}}'>
                          {!!Form::label('presenter_id','Presenter',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::select('presenter_id',listPresenters(),old('presenter_id'),['class' => 'form-control', 'id' => 'listPresenter'])!!}                            
                          </div>
                        </div>
                    @endif
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
                <span id="alertRegistrasikan" class="help-block text-center text-danger"></span>
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

                    @if(auth()->user()->isKeuangan())
                        <div class='form-group{{$errors->has('presenter_id') ? ' has-error' : ''}}'>
                          {!!Form::label('presenter_id','Presenter',['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::select('presenter_id',listPresenters(),old('presenter_id'),['class' => 'form-control', 'id' => 'listPresenter'])!!}                            
                          </div>
                        </div>
                    @endif
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
            $('.melayani').click(function(){
                var aplikan_id = $(this).attr('idaplikan');                
                $('input[id="aplikanIdMelayani"]').val(aplikan_id);
            });

            $('.daftarkan').click(function(){
                var aplikan_id = $(this).attr('idaplikan');                           
                var presenter_id = $(this).attr('idpresenter');
                if(presenter_id != ''){                    
                    $('select#listPresenter option[value='+presenter_id+']').prop('selected',true);
                }else{
                    $('select#listPresenter').prepend('<option selected>Pilih Presenter</option>');
                    $('#alertDaftarkan').html('Aplikan ini belum di take presenter.');
                }
                $('input[id="aplikanIdDaftarkan"]').val(aplikan_id);                
            });

             $('.registrasikan').click(function(){
                var aplikan_id = $(this).attr('idaplikan');
                var presenter_id = $(this).attr('idpresenter');
                var nama_presenter_pendaftar = $(this).attr('nama_presenter_pendaftar');
                if(presenter_id != ''){                    
                    $('select#listPresenter option[value='+presenter_id+']').prop('selected',true);
                }else{

                    $('select#listPresenter').prepend('<option selected>Pilih Presenter</option>');
                    if(nama_presenter_pendaftar !=''){
                        $('#alertRegistrasikan').html('Aplikan ini belum di take presenter. Presenter pendaftarannya adalah <b>' + nama_presenter_pendaftar + '</b>');
                    }else{
                        $('#alertRegistrasikan').html('Aplikan ini belum di take presenter. Presenter pendaftarannya <b>tidak diketahui</b>');
                    }
                }

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
            // $('#filterStatus').change(function(){
            //     var status_id = $(this).val();                
            //     window.location = '{{route('aplikan.all')}}?status_id='+status_id;
            // });
        });
    </script>
@endsection
