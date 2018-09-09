@extends('layouts.backend.master')
@section('title')
    Page Builder
@stop

@section('header')
    <link rel="stylesheet" href="{{url('/')}}/assets/backend/js/plugins/grid-editor/grideditor.css">
@stop
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Page Builder</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard.index')}}">Page Builder</a>
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
                    
                    <div id="tinyMCE"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/jquery.tinymce.min.js"></script>
    <script src="{{url('/')}}/assets/backend/js/plugins/grid-editor/jquery.grideditor.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#tinyMCE').gridEditor({
                new_row_layouts: [[12], [6,6], [9,3]],
            });
        });
    </script>
@stop