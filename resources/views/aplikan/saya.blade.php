@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  Aplikan Terbaru
@stop

@section('content')
  	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Aplikan</h2>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{route('aplikan.index')}}">Aplikan Saya</a>
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
                <div class="ibox">
                        <div class="ibox-title">
                            <h5>Daftar Aplikan saya</h5>
                            <div class="ibox-tools">
                                <a href="{{route('aplikan.index')}}" class="btn btn-primary btn-xs">Aplikan Terbaru</a>
                            </div>
                        </div>
                        <div class="ibox-content">                           
                            <div class="project-list">

                                <table class="table table-hover">
                                    <tbody>
                                    @foreach($aplikan as $apl)                                
                                    <tr>
                                        <td class="project-status">
                                            <span class="label label-warning">{{$apl->status->nama}}</span><br>
                                            <span class="label label-warning">{{$apl->status_detail or ''}}</span>
                                        </td>
                                        <td class="project-title">
                                            <a href="{{route('aplikan.view',['aplikan' => $apl])}}">{{$apl->nama}}</a>
                                            <br>
                                            <small>{{$apl->konsentrasi->nama}}</small>
                                            <br>
                                            <small>{{$apl->tanggal_daftar->diffForHumans()}}</small>
                                        </td>                                        
                                        <td class="project-people" width="20%">
                                            <small>{{$apl->alamatLengkap()}}</small>
                                        </td>
                                        <td class="project-people" width="20%">
                                            <small>{{$apl->jmlFollowedUp() >= 1 ? $apl->jmlFollowedUp().' Kali di follow up' : 'Blm di follow up'}}</small><br>
                                            <small>{{$apl->jmlDilayani() >= 1 ? $apl->jmlDilayani().' Kali di layani' : 'Blm pernah di layani'}}</small><br>
                                        </td>
                                        <td class="project-actions">
                                            @if($apl->telepon)
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone={{hp($apl->telepon)}}&text=Halo%20{{$apl->nama}}"><i style="background-color: #00e676;color: #fff;padding: 3px;font-size: 12pt;" class="fa fa-whatsapp"></i></a>
                                            @endif
                                             <a class="btn btn-xs btn-primary followup" aplikan-id="{{$apl->id}}" data-toggle="modal" href='#followupModal'>Followup</a>
                                             @if(!in_array($apl->status->id,[3,4]))
                                                @if(!$apl->status_detail)
                                                    <a class="btn btn-xs btn-success daftarkan" data-toggle="modal" href='#formDaftarkan' aplikan-id="{{$apl->id}}">Daftarkan</a>
                                                @endif
                                            @endif
                                            @if($apl->status->id == 3)          
                                                 <a class="btn btn-xs btn-success registrasikan" data-toggle="modal" href='#formRegistrasikan' idaplikan="{{$apl->id}}">Registrasikan</a>
                                            @endif
                                            @if($apl->status->id == 2)
                                            <button idaplikan="{{$apl->id}}" class="btn btn-xs btn-danger release"><i class="fa fa-thumbs-down"></i> Release </button>
                                            @endif
                                        </td>
                                    </tr> 
                                    @endforeach                                                                       
                                    </tbody>
                                </table>
                                {{$links}}                            
                            </div>
                        </div>
                    </div>

            </div>          
        </div>
	</div>

    <div class="modal fade" id="followupModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Follow Up Aplikan</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['class' => 'form-horizontal','route' => 'post.aplikan.followedup'])!!}
              
                      <div class='form-group{{$errors->has('label') ? ' has-error' : ''}}'>
                        {!!Form::label('hasil','Hasil Follow up',['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::text('keterangan',old('keterangan'),['class' => 'form-control'])!!}
                          @if($errors->has('keterangan'))
                            <span class="help-block">{{$errors->first('keterangan')}}</span>
                          @endif
                        </div>
                      </div>
                      <input type="hidden" id="aplikanIdFollowup" name="aplikan_id">                      
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

        $('.release').click(function(){
                var el = $(this);
                var idaplikan = el.attr('idaplikan');
                var _token = '{{Session::token()}}';
                el.html('<i class="fa fa-spinner fa-spin"></i> Loading')
                $.ajax({
                  method:'POST',
                  url:'{{route('ajax.aplikan.release')}}',
                  data:{_token:_token,idaplikan:idaplikan}
                }).success(function(data){                                        
                    el.closest('tr').hide('slow',function(){
                        el.remove();
                    });
                    toastr.success('Aplikan berhasil di release !');                         
                });              

            });
    });
</script>
@endsection
