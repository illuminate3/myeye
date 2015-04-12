@extends('admin.layouts.default')
@section('css')
    <link rel="stylesheet" href="/css/magnific-popup.css"/>
@endsection

@section('container')

<div ng-view></div>

@endsection

@section('js')
    <script src="{{asset('js/admin/app/services/SunglassesLensesFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/LensesFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/sunglassesLenses/SunglassesLensesController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/sunglassesLenses/SunglassesLensesCreateController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/sunglassesLenses/SunglassesLensesEditController.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

@endsection