@extends('admin.layouts.default')

@section('container')
<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                صفحه اصلی
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="/adminmaster">صفحه اصلی</a>
                </li>
            </ol>
        </div>
    </div>

    <div ng-view></div>
<!-- /.row -->
@endsection

@section('js')
    <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    {{--<script src="{{asset('js/admin/tinyeditor.js')}}"></script>--}}
    <script src="{{asset('js/admin/app/controller/main/MainController.js')}}"></script>

@endsection