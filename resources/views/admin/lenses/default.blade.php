@extends('admin.layouts.default')


@section('container')

<div ng-view></div>

@endsection

@section('js')
    <script src="{{asset('js/admin/app/services/LensesFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/lenses/LensesController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/lenses/LensesCreateController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/lenses/LensesEditController.js')}}"></script>

@endsection