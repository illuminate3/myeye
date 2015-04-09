@extends('admin.layouts.default')


@section('container')

<div ng-view></div>

@endsection

@section('js')
    <script src="{{asset('js/admin/app/controller/frames/FramesController.js')}}"></script>
    <script src="{{asset('js/admin/app/services/FramesFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/frames/FramesCreateController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/frames/FramesEditController.js')}}"></script>

@endsection