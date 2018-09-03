<div class="alert alert-warning">  
  <h4 class="text-center">Translation for "{{ucfirst($request->field_name)}}"</h4>
</div>
{!!Form::open(['route' =>'translate.update', 'class' => 'form-horizontal'])!!}
      <input type="hidden" value="{{$request->foreign_key_id}}" name="foreign_key_id">
      <input type="hidden" value="{{$request->table_name}}" name="table_name">
      <input type="hidden" value="{{$request->field_name}}" name="field_name">
      <input type="hidden" value="id" name="language_code">
      <input type="hidden" value="{{$request->is_html}}" name="is_html">
    <div class='form-group{{$errors->has('content') ? ' has-error' : ''}}'>
      {!!Form::label('content','Translation',['class' => 'col-sm-2 control-label'])!!}
      <div class="col-sm-10">
        {!!Form::textarea('content',$content,['class' => 'form-control tinyMCE','placeholder' => 'Content','style' => 'height:350px;'])!!}
        @if($errors->has('content'))
          <span class="help-block">{{$errors->first('content')}}</span>
        @endif
      </div>
    </div>
    <input type="submit" value="OK">
{!!Form::close()!!}

@if($request->is_html == 1)
<script>
  tinymce.init(editor_config);
</script>
@endif