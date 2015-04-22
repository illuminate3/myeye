@extends('layouts.product')

@section('css')
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
@endsection

@section('content')
    <div ng-view></div>
@endsection

@section('footer')
<div class="container">
    <footer>
        <p>© Company 2014</p>
    </footer>
</div>

<script src="{{asset('js/angular.min.js')}}"></script>
<script src="{{asset('js/angular-route.min.js')}}"></script>
<script src="{{asset('js/app/app.js')}}"></script>
<script src="{{asset('js/app/services/messageFactory.js')}}"></script>
<script src="{{asset('js/app/services/SunEyewearFactory.js')}}"></script>
<script src="{{asset('js/app/controller/SunEyewearProductController.js')}}"></script>

@endsection
