@extends('layouts.default')

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
<script src="{{asset('js/app/services/RxEyewearFactory.js')}}"></script>
<script src="{{asset('js/app/services/MaterialsFactory.js')}}"></script>
<script src="{{asset('js/app/controller/RxEyewearController.js')}}"></script>
@endsection
