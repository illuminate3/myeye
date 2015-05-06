@extends('layouts.order')


@section('content')
<div class="container">
    <div class="row" style="margin-top: 5em">
        @include('flash::message')
    </div>
</div>

<div class="container">
    <div class="row" style="margin-top: 5em">
        <div class="col-md-8 col-lg-offset-1">
            <h2>سبد خرید {{Auth::user()->name}} </h2>
        </div>

    </div>
    <div class="row" style="margin-top: 5em">
        <div class="col-md-8 col-lg-offset-1">
            <div ng-view></div>
        </div>

    </div>
</div>

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
<script src="{{asset('js/app/services/BasketFactory.js')}}"></script>
<script src="{{asset('js/app/controller/BasketController.js')}}"></script>

@endsection
