@extends('layouts.backend.master')
@section('header')
  
@endsection
@section('title')
  You are not authorized
@stop

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  	<div class="middle-box text-center animated fadeInDown">
        <h1>401</h1>
        <h3 class="font-bold">Anda tidak dizinkan mengakses halaman ini</h3>

        <div class="error-desc">
            Hubungi Superadmin untuk dapat mengaksesnya <br><a href="{{route('dashboard.index')}}" class="btn btn-primary m-t">Dashboard</a>
        </div>
    </div>
</div>
@stop

@section('footer')

@endsection
