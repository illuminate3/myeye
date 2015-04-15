@extends('admin.layouts.default')


@section('container')

<div ng-view></div>

@endsection

@section('js')
    <script src="{{asset('js/admin/app/controller/products/ProductsController.js')}}"></script>
    <script src="{{asset('js/admin/app/services/ProductsFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/FramesFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/products/ProductsCreateController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/products/ProductsEditController.js')}}"></script>
     <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>

@endsection