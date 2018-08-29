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
                    
                </div>
            </div>
        </div>
    </div>




@stop