@extends('layouts.backend.master')
@section('title')
  List of Courses
@stop
@section('content')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Courses</h2>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('courses.index')}}">Courses</a>
          </li>          
      </ol>
       
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#courseModal">Add course</button>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content">
	<div class="ibox float-e-margins">
        
        <div class="ibox-content">
            <table class="table">
                <thead>
                    <tr>
                    <th><input type="checkbox" id="checkAll"></th><th>id</th>
                <th>title</th>
                <th>created_at</th>
                <th>Actions</th>
        
                    </tr>
                </thead>
            <tbody>
            @foreach($courses as $course)
            <tr>
            <td><input type="checkbox" class="sub_chk" data-id="{{$course->id}}"></td>
            <td>{{$course->id}}</td>
                    <td>{{$course->title}}</td>                    
                    <td>{{$course->created_at->format("d M Y")}}</td>
                <td>
                
                <form action="{{route('courses.destroy',$course)}}" method="post">
                <a target="_blank" class="btn btn-xs btn-white" href="{{route("page.course.single",$course->slug)}}" data-toggle="tooltip" data-placement="top" title="View on site"><i class="fa fa-globe"></i>
                </a>
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
            {{ $courses->links() }}

            <button class="btn btn-danger pull-right" id="deleteAll">Delete</button>
        </div>
    </div>   
</div>

<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!!Form::open(['route' =>'courses.store', 'class' => 'form-horizontal'])!!}
         <div class="form-group{{$errors->has("title") ? " has-error" : ""}}">
              {!!Form::label("title","Title",["class" => "col-sm-2 control-label"])!!}
              <div class="col-sm-10">
                {!!Form::text("title",old("title"),["class" => "form-control","placeholder" => "Title"])!!}
                @if($errors->has("title"))
                  <span class="help-block">{{$errors->first("title")}}</span>
                @endif
              </div>
            </div>
            <div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
              {!!Form::label('description','Description',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::textarea('description',old('description'),['class' => 'form-control tinyMCE','placeholder' => 'Description'])!!}
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

              $('#checkAll').on('click', function(e) {
               if($(this).is(':checked',true))  
               {
                  $(".sub_chk").prop('checked', true);  
               } else {  
                  $(".sub_chk").prop('checked',false);  
               }  
              });
              $('#deleteAll').click(function(){
                var allVals = [];  
                  $(".sub_chk:checked").each(function() {  
                      allVals.push($(this).attr('data-id'));
                  });  


                  if(allVals.length <=0)  
                  {  
                    swal({
                      title:'Ooops !',
                       text: "Select row/s to delete.",
                       type: "info",                       
                       });

                  }  else {
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
                        var join_selected_values = allVals.join(",");
                        var _token = '{{\Session::token()}}';
                        $.ajax({
                            url: '{{route('courses.deleteAll')}}',
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {ids:join_selected_values,_token:_token},
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {  
                                        $(this).parents("tr").remove();
                                    });
                                    toastr.success('Success', 'Data has been deleted.');                                    
                                } else if (data['error']) {
                                    console.log(data['error']);
                                } else {
                                    console.log('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                console.log(data.responseText);
                            }
                        });


                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                      }
                    });
                  }
              });
        });

    </script>
@endsection