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
                      <h5>Pembayaran Via</h5>
                  </div>
                  <div class="ibox-content">
                      {!!Form::open(['route' =>'post.settings.kampus.update', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
                      <ul class="list-group" id="listBayarVia">
                      @foreach($bayarVia as $key => $value)
                        <li class="list-group-item" id="list-{{$key}}">
                          {{$value}} 
                          @if($key != 1)
                          <i metode-pembayaran-id="{{$key}}" class="fa fa-times pull-right btnHapusMetodePembayaran" style="cursor: pointer;"></i>                          
                          @endif
                          <input type="hidden" class="bayar_via" name="bayar_via[{{$key}}]" value="{{$value}}">
                        </li>                        
                      @endforeach
                      </ul>
                      <hr>                      
                      <div class="input-group">
                        <input type="text" class="form-control" name="metode-pembayaran" placeholder="Tambah metode pembayaran"> 
                        <span class="input-group-btn"> 
                          <button type="button" id="btnTambahMetodePembayaran" class="btn btn-primary">Tambah
                          </button> 
                        </span>
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
  $('body').on('click','i.btnHapusMetodePembayaran',function(){
    var el = $(this);
    if(el.attr('metode-pembayaran-id') == 1){
      return false;
    }
    el.closest('li').hide('slow',function(){      
        el.remove();
    });
  });
  $('#btnTambahMetodePembayaran').click(function(){    
    console.log($('input.bayar_via'));
    var bayar = $('input.bayar_via')
              .map(function(){return $(this).attr('name').key();}).get();
    // $('input[name="bayar_via[]"]').each(function(){
    console.log(bayar);
    
    var metodePembayaran = $('input[name="metode-pembayaran"]').val();
    var newList = '<li class="list-group-item" id="list-{{$key}}" style="display:none;">'+metodePembayaran+'</li>';
    $('ul#listBayarVia').append(newList);
    $('li#list-{{$key}}').slideDown('slow');
  });
});
</script>
@endsection
