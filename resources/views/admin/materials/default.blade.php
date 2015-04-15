@extends('admin.layouts.default')


@section('container')

<div ng-view></div>

@endsection

@section('js')
    <script src="{{asset('js/admin/app/services/MaterialsFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/materials/MaterialsController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/materials/MaterialsCreateController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/materials/MaterialsEditController.js')}}"></script>
     <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>

@endsection