<!DOCTYPE html>
<html lang="en" ng-app="shwoodApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>عینک الیوود </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/admin/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/admin/plugins/metisMenu.min.css')}}" rel="stylesheet">
{{--    <link href="{{asset('css/admin/plugins/dataTables.bootstrap.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/admin/sb-admin.css')}}" rel="stylesheet">
    @yield('css')
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
       <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
       <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
       <![endif]-->
   </head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        @include('admin.layouts.partials.nav')
        <!-- /.Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid">
               
                <!-- Page Heading -->
                @include('admin.layouts.partials.heading')
                <!-- Page Heading -->

                <!-- Page body -->
                 @yield('container')
                <!-- /Page body -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="{{asset('js/admin/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/admin/plugins/menu/metisMenu.min.js')}}"></script>
{{--    <script src="{{asset('js/admin/plugins/dataTables/jquery.dataTables.js')}}"></script>--}}
{{--    <script src="{{asset('js/admin/plugins/dataTables/dataTables.bootstrap.js')}}"></script>--}}
    <script src="{{asset('js/admin/sb-admin.js')}}"></script>
    {{--<script src="{{asset('js/admin/custom.js')}}"></script>--}}
    <script src="{{asset('js/angular.min.js')}}"></script>
    <script src="{{asset('js/angular-route.min.js')}}"></script>
    <script src="{{asset('js/admin/tinymce-ui.js')}}"></script>
    <script src="{{asset('js/admin/app/app.js')}}"></script>
    <script src="{{asset('js/admin/app/services/messageFactory.js')}}"></script>
    {{--<script src="{{asset('js/angular-pickadate.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/ngDialog.min.js')}}"></script> --}}


    @yield('js')

</body>

</html>