@extends('admin.layouts.default')


@section('container')

<div ng-view></div>

@endsection

@section('js')
    <script src="{{asset('js/admin/app/controller/questions/QuestionsController.js')}}"></script>
    <script src="{{asset('js/admin/app/services/QuestionsFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/questions/QuestionsViewController.js')}}"></script>
     <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>

@endsection