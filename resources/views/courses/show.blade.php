@extends('layouts.backend.master')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Course</h2>
         <ol class="breadcrumb">
            <li>
                <a href="{{route('courses.index')}}">Courses</a>
            </li>          
            <li>
                <a href="{{route('courses.show',$course)}}">Edit</a>
            </li>          
        </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="{{route('courses.edit',$course)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
      </div>
    </div>
</div>
<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-6">
    	<div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Course Detail</h5>          
          </div>
          <div class="ibox-content">
              <table class="table table-striped">
                <tr>                        
                    <td>Title</td>
                    <td><strong>{{$course->title}}</strong></td>
                    </tr>
                <tr>                        
                    <td>Level</td>
                    <td>{{$course->level->title}}</td>
                    </tr>
                
                <tr>                        
                    <td>Description</td>
                    <td>{!!$course->description!!}</td>
                    </tr>
                
                </table>
          </div>
      </div>         
    </div>

    <div class="col-md-6">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Course Fees</h5>  
              <button href="#" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#coursePriceModal">Add Fee</button>        
          </div>
          <div class="ibox-content">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th>Student Type</th>
                <th>Payment Scheme</th>
                <th style="width: 20%;">Fee</th>                
                <th></th>                
              </tr>
            </thead>
            <tbody>
              @foreach($course->prices()->orderBy('student_type')->get() as $price)
              <tr @if($price->student_type == 'New') class="success" @elseif($price->student_type == 'Registered') class="info" @endif>
                <td><strong>{{$price->studentType()}} Student</strong></td>
                <td>{{$price->paymentScheme()}}</td>
                <td>{{toRp($price->amount_idr)}}</td>                
                <td><a href="{{route('prices.edit',$price)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a></td>                
              </tr>      
              @endforeach
            </tbody>
          </table>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="coursePriceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:80%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Fee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {!!Form::open(['route' =>'prices.store', 'class' => 'form-horizontal'])!!}
         <input type="hidden" name="course_id" value="{{$course->id}}">
            <div class='form-group{{$errors->has('student_type') ? ' has-error' : ''}}'>
              {!!Form::label('student_type','Student Type',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::select('student_type',['new' => 'New','registered' => 'Registered'],old('student_type'),['class' => 'form-control'])!!}
                @if($errors->has('student_type'))
                  <span class="help-block">{{$errors->first('student_type')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('payment_scheme') ? ' has-error' : ''}}'>
              {!!Form::label('payment_scheme','Payment Scheme',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::select('payment_scheme',['one_time' => 'One Time','3_monthly_installment' => '3 Monthly Payment'],old('payment_scheme'),['class' => 'form-control'])!!}
                @if($errors->has('payment_scheme'))
                  <span class="help-block">{{$errors->first('payment_scheme')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('amount_idr') ? ' has-error' : ''}}'>
              {!!Form::label('amount_idr','Fee IDR',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::text('amount_idr',old('amount_idr'),['class' => 'form-control uang','placeholder' => 'IDR','required' => 'true'])!!}
                @if($errors->has('amount_idr'))
                  <span class="help-block">{{$errors->first('amount_idr')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('notes') ? ' has-error' : ''}}'>
              {!!Form::label('notes','Notes',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::textarea('notes',old('notes'),['class' => 'form-control tinyMCE','placeholder' => 'Notes'])!!}
                @if($errors->has('notes'))
                  <span class="help-block">{{$errors->first('notes')}}</span>
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
   <script src="{{url('assets/backend')}}/js/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
   <script>
    $(document).ready(function() {    
      $('.uang').inputmask({
                'alias': 'numeric', 
                'radixPoint': ',',
                'groupSeparator': '.',
                'autoGroup': true,
                'digits': 0,
                'digitsOptional': false,
                'prefix': 'Rp ',
                'placeholder': '0',
                'removeMaskOnSubmit':true,
                'rightAlign': false
      });       
    });
</script>
@endsection