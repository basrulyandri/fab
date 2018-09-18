@extends('layouts.backend.master')
@section('title')
  Level Detail | {{$level->title}}
@stop
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Levels</h2>
         <ol class="breadcrumb">
            <li>
                <a href="{{route('levels.index')}}">Levels</a>
            </li>          
            <li>
                <a href="{{route('levels.show',$level)}}">Edit</a>
            </li>          
        </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="{{route('levels.edit',$level)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
      </div>
    </div>
</div>
<div class="wrapper wrapper-content">
  <div class="col-md-6">
	<div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Level Detail</h5>          
      </div>
      <div class="ibox-content no-padding">
          <table class="table table-striped">            
            <tr>                        
                <td><strong>Title</strong></td>
                <td><strong>{{$level->title}}</strong></td>
                </tr>
            
            <tr>                        
                <td>Description</td>
                <td>{!!$level->description!!}</td>
            </tr>           
            
          </table>
      </div>
    </div>   
  </div>

  <div class="col-md-6">
  <div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Courses</h5>           
          <button href="#" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#courseitemModal">Add Course</button>        
      </div>
      <div class="ibox-content">
          @if(!$level->courses->isEmpty())
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Title</th>  
                <th>Actions</th>              
              </tr>
            </thead>
            <tbody>
              @foreach($level->courses as $course)
              <tr>
                <td><a href="{{route('courses.show',$course)}}">{{$course->title}}</a></td>
                <td>
                  <form action="{{route('courses.destroy',$course)}}" method="post">
                      <a class="btn btn-xs btn-white" href="{{route("courses.show",$course)}}" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i>
                  </a>

                  <a class="btn btn-xs btn-warning" href="{{route("courses.edit",$course)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i>
                  </a>
                      {!! method_field('delete') !!}                    
                      {!! csrf_field() !!}
                      <button type="submit" value="Delete" class="btn btn-xs btn-danger" id="courseDelete"><i class="fa fa-trash"></i></button>
                      
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>  
          @else
            <p>There is no courses data.</p>
          @endif

      </div>
    </div>   
  </div>

</div>

<div class="modal fade" id="courseitemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:80%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Courseitem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!!Form::open(['route' =>'courses.store', 'class' => 'form-horizontal'])!!}

          <div class='form-group{{$errors->has('level_id') ? ' has-error' : ''}}'>
            {!!Form::label('level_id','Level',['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
              {!!Form::select('level_id',\App\Level::pluck('title','id')->prepend('Select Parent Level',''),$level->id,['class' => 'form-control','required' => 'true','disabled' => 'true'])!!}
              @if($errors->has('level_id'))
                <span class="help-block">{{$errors->first('level_id')}}</span>
              @endif
            </div>
          </div>
          <input type="hidden" name="level_id" value="{{$level->id}}">
         <div class="form-group{{$errors->has("title") ? " has-error" : ""}}">
            {!!Form::label("title","Title",["class" => "col-sm-2 control-label"])!!}
            <div class="col-sm-10">
              {!!Form::text("title",old("title"),["class" => "form-control","placeholder" => "Title",'required' => 'true'])!!}
              @if($errors->has("title"))
                <span class="help-block">{{$errors->first("title")}}</span>
              @endif
            </div>
          </div>
          <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
            {!!Form::label('description','Decription',['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
              {!!Form::textarea('description',old('description'),['class' => 'form-control tinyMCE','placeholder' => 'Decription'])!!}
              @if($errors->has('description'))
                <span class="help-block">{{$errors->first('description')}}</span>
              @endif
            </div>
          </div>
          <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
              {!!Form::label('thumbnail','thumbnail',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
              <div class="input-group">
                 <span class="input-group-btn">
                   <a id="uploadbutton" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                     <i class="fa fa-picture-o"></i> Choose
                   </a>
                 </span>
                 <input id="thumbnail" class="form-control" type="text" name="thumbnail">
               </div>
               <img src="{{url('assets/backend')}}/img/no-thumbnail.jpg" id="holder" style="margin-top:15px;width:20%">          
             </div>
            </div>          
      </div>
      <div class="modal-footer">        
        <input type="submit" class="btn btn-primary" value="Save">
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>

@stop
@section('footer')
 <script>
  $(document).ready(function() {  
    var domain = "{{url('/')}}/admin/rollo-filemanager";
    $('#uploadbutton').filemanager('image', {prefix: domain});

    $('body').on('click','#courseDelete',function(e){
              e.preventDefault();
              var formElement = $(this).parent();
                swal({
                  title:'SURE ?',
                   text: "Want to delete ?",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, delete it!",
                   closeOnConfirm: true,
                },function(isConfirm){
                  if (isConfirm) {
                    formElement.submit();
                  }
                });
              });
  });
</script>
@stop