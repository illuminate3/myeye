@extends('admin.layouts.default')


@section('container')

<div ng-view></div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/fileinput.min.css')}}"/>
@endsection
@section('js')
    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/emails/EmailsController.js')}}"></script>
{{--    <script src="{{asset('js/admin/app/services/EmailsFactory.js')}}"></script>--}}
    {{--<script src="{{asset('js/admin/app/controller/emails/EmailsViewController.js')}}"></script>--}}

@endsection