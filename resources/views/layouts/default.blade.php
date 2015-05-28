
 <!doctype html>
 <html ng-app="eyewearApp" >
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="keywords" content="الیوود, اولین مرکز عینک چوبی ایران, عینک طبی, عینک آفتابی, سفارش عینک, عینک طبی چوبی, عینک آفتابی چوبی, فروشگاه عینک, عینک چوبی" />
     <meta name="description" content="الیوود : اولین مرکز عینک طبی و آفتابی چوبی ایران - از عینک های الیوود لذت ببرید." />
     <meta name="author" content="">
     <link rel="icon" href="../../favicon.ico">

     <title>الیوود - اولین مرکز عینک چوبی ایران - عینک چوبی - سفارش عینک - عینک فروشی آنلاین - خرید آنلاین عینک طبی - خرید آنلاین عینک چوبی - فروشگاه عینک چوبی - عینک </title>

     <!-- Bootstrap core CSS -->
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="{{asset('css/custom.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="/css/font-awesome.min.css" />

     @yield('css')

     <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
     <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
     <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
   </head>
 <body>

    @include('layouts.partials.nav')
     <!-- Main jumbotron for a primary marketing message or call to action -->
    @include('layouts.partials.jumbotron')
    <!-- End main jumbotron for a primary marketing message or call to action -->
       <!-- Example row of columns -->
       @yield('content')

       @yield('footer')


     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
     <script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
     <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


 </body>
 </html>