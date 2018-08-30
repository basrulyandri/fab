<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{url('assets/backend')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/css/animate.css" rel="stylesheet">
    <link href="{{url('assets/backend')}}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{!!url('assets/backend')!!}/js/plugins/sweetalert/sweetalert.css">
    <link href="{{url('assets/backend')}}/css/rollo-custom.css?ver=3" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/backend')}}/js/plugins/typeahead/typeahead.css">
    @yield('header')
</head>

<body>

    <div id="wrapper">

   @include('layouts.backend.sidebar')

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">                
                @if(auth()->user()->isAdminKampus())
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>  <span class="label label-primary"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="{{route('settings.kampus.general')}}">
                                <div>
                                    <i class="fa fa-gear fa-fw"></i> Pengaturan Umum                                
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>                        
                    </ul>
                </li>
                @endif

                <li>
                    <a href="{{route('auth.logout')}}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>

        @yield('content')
        <div class="modal fade" id="translate">
          <div class="modal-dialog" style="width: 80%;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Translate to Bahasa Indonesia</h4>
              </div>
              <div class="modal-body" id="bodyTranslate">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <div class="footer">
                <div class="pull-right">
                    Created By Basrul Yandri
                </div>
                <div>
                    <strong>Copyright</strong> <a href="http://rolloic.com">Rolloic.com</a> &copy; 2017
                </div>
            </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="{{url('assets/backend')}}/js/jquery-2.1.1.js"></script>
    <script src="{{url('assets/backend')}}/js/bootstrap.min.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{!!url('assets/backend')!!}/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{url('assets/backend')}}/js/inspinia.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/pace/pace.min.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/toastr/toastr.min.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="{{url('assets/backend')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{url('assets/backend')}}/js/plugins/tinymce/tinymce.min.js"></script>

<script src="{{url('assets/backend')}}/js/plugins/typeahead/typeahead.js"></script>
<script src="{{url('/')}}/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        @if(Session::has('success'))
          swal({title: "Success",
                type: 'success',
                text: "{{Session::get('success')}} !",
                timer: 3000,
                showConfirmButton: true });
          @endif

          @if(Session::has('warning'))
            swal({title: "SURE ?",
                  type: 'warning',
                  text: "{{Session::get('success')}} !",
                  timer: 3000,
                  showConfirmButton: true });
          @endif

          @if(Session::has('danger'))
            swal({title: "ERROR !",
                  type: 'error',
                  text: "{{Session::get('danger')}} !",
                  timer: 3000,
                  showConfirmButton: true });
          @endif
            var _token = "{{Session::token()}}";
            var editor_config = {
                path_absolute : "{{ URL::to('/') }}/",
                selector: ".tinyMCE",
                plugins: [
                  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                  "searchreplace wordcount visualblocks visualchars code fullscreen",
                  "insertdatetime media nonbreaking save table contextmenu directionality",
                  "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                  var cmsURL = editor_config.path_absolute + 'admin/rollo-filemanager?field_name=' + field_name;
                  if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                  } else {
                    cmsURL = cmsURL + "&type=Files";
                  }

                  tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                  });
                }
              };
        
          $(document).ready(function(){
            tinymce.init(editor_config);  
            $('.translateBtn').click(function(){
                var el = $(this);
                var foreign_key_id = el.attr('foreign-key-id');
                var table_name = el.attr('table-name');
                var field_name = el.attr('field-name');
                var model_name = el.attr('model-name');
                var is_html = el.attr('is-html');
                $.ajax({
                    url: '{{route('ajax.load.translate.modal')}}',
                    type:'POST',                                       
                    data: {_token: _token,table_name:table_name,field_name:field_name,foreign_key_id:foreign_key_id,model_name:model_name,is_html:is_html},
                })
                .success(function(data) {
                    $('#bodyTranslate').html(data.html);
                });
                
            });          
          });
    </script>
    @yield('footer')
</body>

</html>