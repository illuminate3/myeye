@extends('admin.layouts.default')


@section('container')

<div ng-view></div>

@endsection

@section('js')
    <script src="{{asset('js/admin/app/services/OrdersFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/orders/OrdersController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/orders/UserOrdersController.js')}}"></script>
    {{--<script src="{{asset('js/admin/app/controller/lenses/OrdersCreateController.js')}}"></script>--}}
    {{--<script src="{{asset('js/admin/app/controller/lenses/OrdersEditController.js')}}"></script>--}}

@endsection