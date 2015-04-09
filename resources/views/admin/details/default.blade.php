@extends('admin.layouts.default')

@section('css')
    <link rel="stylesheet" href="/css/magnific-popup.css"/>
@endsection
@section('container')

<div class="row">
    <div class="col-lg-12 alert alert-warning">
        <h1 class="page-header">
            نام محصول : <mark>{{$product->title}}</mark> شکل فریم: <mark> {{$product->frame->title}}</mark>
            <small>{{$product->title}} - {{$product->frame->title}}</small>
        </h1>

    </div>
</div>

<div ng-view></div>

@endsection


@section('js')
    <script src="{{asset('js/admin/app/controller/products/details/DetailsController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/products/details/DetailsCreateController.js')}}"></script>
    <script src="{{asset('js/admin/app/controller/products/details/DetailsEditController.js')}}"></script>
    <script src="{{asset('js/admin/app/services/DetailsFactory.js')}}"></script>
    <script src="{{asset('js/admin/app/services/MaterialsFactory.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    {{--<script src="{{asset('js/admin/app/controller/frames/FramesCreateController.js')}}"></script>--}}
    {{--<script src="{{asset('js/admin/app/controller/frames/FramesEditController.js')}}"></script>--}}

@endsection