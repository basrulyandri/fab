@extends('layouts.backend.master')
@section('title')
  Edit Fee | {{$price->title}}
@stop
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Edit Price</h2>       
    </div>
    <div class="col-sm-8">
        
    </div>
</div>
<div class="wrapper wrapper-content">
  <div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Edit Course</h5>          
      </div>
      <div class="ibox-content">        
            {!!Form::open(['route' =>['prices.update',$price], 'class' => 'form-horizontal'])!!}         
            <div class='form-group{{$errors->has('student_type') ? ' has-error' : ''}}'>
              {!!Form::label('student_type','Student Type',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::select('student_type',['new' => 'New','registered' => 'Registered'],$price->student_type,['class' => 'form-control'])!!}
                @if($errors->has('student_type'))
                  <span class="help-block">{{$errors->first('student_type')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('payment_scheme') ? ' has-error' : ''}}'>
              {!!Form::label('payment_scheme','Payment Scheme',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::select('payment_scheme',['one_time' => 'One Time','3_monthly_installment' => '3 Monthly Payment'],$price->payment_scheme,['class' => 'form-control'])!!}
                @if($errors->has('payment_scheme'))
                  <span class="help-block">{{$errors->first('payment_scheme')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('amount_idr') ? ' has-error' : ''}}'>
              {!!Form::label('amount_idr','Fee IDR',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::text('amount_idr',$price->amount_idr,['class' => 'form-control uang','placeholder' => 'IDR','required' => 'true'])!!}
                @if($errors->has('amount_idr'))
                  <span class="help-block">{{$errors->first('amount_idr')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('notes') ? ' has-error' : ''}}'>
              {!!Form::label('notes','Notes',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::textarea('notes',$price->notes,['class' => 'form-control tinyMCE','placeholder' => 'Notes'])!!}
                @if($errors->has('notes'))
                  <span class="help-block">{{$errors->first('notes')}}</span>
                @endif
              </div>
            </div>             
                    
              <input type="submit" class="btn btn-primary" value="Update">
            {!!Form::close()!!}          
      </div>
  </div>   
</div>

@stop

@section('footer')
  <script>
    $(document).ready(function(){
      var domain = "{{url('/')}}/admin/rollo-filemanager";
      $('#uploadbutton').filemanager('image', {prefix: domain});   
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
@stop