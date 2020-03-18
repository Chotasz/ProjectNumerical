<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ isset($title_page)? $title_page.' |':'' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css_top')
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>

    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="{{asset('assets/admin/vendors/sweetalert/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/global/plugins/orakuploader/orakuploader.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/global/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css')}}" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    @yield('css_bottom')
</head>

<body class="">

    <div id="wrapper">
        @if(!$ProjectName)
            @include('install.sidebar')
        @else
            @include($ProjectName.'.sidebar')
        @endif


        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{url('admin/logout')}}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        @yield('body')
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Company &copy; {{date('Y')}}
                </div>
            </div>

        </div>
        </div>
    @yield('modal')
    <!-- Mainly scripts -->
    <script type="text/javascript">
      var url_gb = '{{url('')}}';
      var asset_gb = '{{asset('')}}';
    </script>
    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/global/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/global/plugins/ckeditor/config.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/sweetalert/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/admin/js/function.js')}}"></script>
    <script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- Full Calendar -->
    <script src="{{asset('js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

    <!-- jQuery UI  -->
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- iCheck -->
    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>


    @yield('js_top')

    @yield('js_bottom')

</body>

</html>
