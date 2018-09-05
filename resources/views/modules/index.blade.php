@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Modules</h2>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('modules.index')}}">Modules</a>
          </li>          
      </ol>
       
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#moduleModal">Add module</button>
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
                <th>description</th>
                <th>courseitem_id</th>
                <th>created_at</th>
                <th>datetime</th>
                <th style="width:10%;">Actions</th>
        
                    </tr>
                </thead>
            <tbody>
            @foreach($modules as $module)
            <tr>
            <td><input type="checkbox" class="sub_chk" data-id="{{$module->id}}"></td>
            <td>{{$module->id}}</td>
                    <td>{{$module->title}}</td>
                    <td>{{$module->description}}</td>
                    <td>{{$module->courseitem_id}}</td>
                    <td>{{$module->created_at->format("d M Y")}}</td>
                <td>{{$module->datetime}}</td>
                    <td>
                
                <form action="{{route('modules.destroy',$module)}}" method="post">
                    <a class="btn btn-xs btn-white" href="{{route("modules.show",$module)}}" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i>
                </a>

                <a class="btn btn-xs btn-warning" href="{{route("modules.edit",$module)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i>
                </a>
                    {!! method_field('delete') !!}                    
                    {!! csrf_field() !!}
                    <button type="submit" value="Delete" class="btn btn-xs btn-danger" id="moduleDelete"><i class="fa fa-trash"></i></button>
                    
                </form>                
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            {{ $modules->links() }}

            <button class="btn btn-danger pull-right" id="deleteAll">Delete</button>
        </div>
    </div>   
</div>

<div class="modal fade" id="moduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Module</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!!Form::open(['route' =>'modules.store', 'class' => 'form-horizontal'])!!}
         <div class="form-group{{$errors->has("title") ? " has-error" : ""}}">
                      {!!Form::label("title","Title",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("title",old("title"),["class" => "form-control","placeholder" => "Title"])!!}
                        @if($errors->has("title"))
                          <span class="help-block">{{$errors->first("title")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("description") ? " has-error" : ""}}">
                      {!!Form::label("description","Description",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("description",old("description"),["class" => "form-control","placeholder" => "Description"])!!}
                        @if($errors->has("description"))
                          <span class="help-block">{{$errors->first("description")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("courseitem_id") ? " has-error" : ""}}">
                      {!!Form::label("courseitem_id","Courseitem_id",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("courseitem_id",old("courseitem_id"),["class" => "form-control","placeholder" => "Courseitem_id"])!!}
                        @if($errors->has("courseitem_id"))
                          <span class="help-block">{{$errors->first("courseitem_id")}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group{{$errors->has("datetime") ? " has-error" : ""}}">
                      {!!Form::label("datetime","Datetime",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("datetime",old("datetime"),["class" => "form-control","placeholder" => "Datetime"])!!}
                        @if($errors->has("datetime"))
                          <span class="help-block">{{$errors->first("datetime")}}</span>
                        @endif
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
            $('body').on('click','#moduleDelete',function(e){
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
                            url: '{{route('modules.deleteAll')}}',
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