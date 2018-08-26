@extends('layouts.backend.master')
@section('title')
    Dashboard
@stop
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Dashboard</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard.index')}}">Dashboard</a>
                </li>                
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">                                
                            <a href="{{route('aplikan.saya')}}"><h5>Aplikan Saya</h5></a>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{jmlAplikanSaya()}}</h1>                                
                            <small>Orang</small>
                        </div>
                    </div>
                </div>                   

                <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Aplikan</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{\App\Aplikan::count()}}</h1>
                                
                                <small>Orang</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Daftar</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">75</h1>
                                
                                <small>Sudah bayar</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                
                                <h5>Registrasi</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">24</h1>
                                
                                <small>Orang</small>
                            </div>
                        </div>
            </div>
            </div>
        </div>
    </div>
</div>



@stop