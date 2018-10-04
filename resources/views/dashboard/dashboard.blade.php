@extends('layouts.backend.master')
@section('title')
    @if(auth()->user()->isStudent())
        Student Area
    @else
        Dashboard
    @endif      
    | {{getOption('web_title')}}          
@stop
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>
                @if(auth()->user()->isStudent())
                    Student Area
                @else
                    Dashboard
                @endif                
            </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard.index')}}">
                        @if(auth()->user()->isStudent())
                            Student Area
                        @else
                            Dashboard
                        @endif                
                    </a>
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
                   @if(auth()->user()->isStudent())
                        <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="middle-box text-center animated fadeInRightBig">
                        <h2 class="font-bold">Hi, {{auth()->user()->getNameOrEmail(true)}}</h2>
                        <h3 class="font-bold">Welcome to Student Area</h3>

                        <div class="error-desc">
                            Now you can start to learn anytime and anywhere you want
                            <br><a href="{{route('my.courses')}}" class="btn btn-primary m-t">Go to Courses Page</a>
                        </div>
                    </div>
                </div>
            </div>
                   @endif 
                </div>
            </div>
        </div>
    </div>




@stop