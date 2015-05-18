@extends('layouts.product')


@section('content')

<div class="container">
    <div class="row" style="margin-top: 5em">
        @include('flash::message')
    </div>
</div>

<div ng-view></div>
@endsection

@section('footer')
<div class="container-fluid " style="background-color: #F2EFE5;padding: 2em 0;margin-top: 4em">
    <footer class="container">
        <div class="row" style="padding-bottom: 3em">
            <p class="col-lg-12">
                لیست نمایندگی‌ها، جهت تهیه لنز عینک
            </p>
            <div class="col-lg-6">
                <ul>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                    <li>
                        لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک لیست نمایندگی‌ها، جهت تهیه لنز عینک
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p>کلیه حقوق مادی و معنوی این سایت متعلق به شرکت <span style="font-weight: bold">eliwood</span> می‌باشد</p>
            </div>
            <div class="col-lg-6">
                <p>دنبال شرکت طراح سایت مدرن هستید؟ فقط کافی است <span><a style="font-weight: bold" href="http://mosharsystem.com" target="_blank">اینجا</a></span> کلیک کنید</p>
            </div>
        </div>
    </footer>
</div>

<script src="{{asset('js/angular.min.js')}}"></script>
<script src="{{asset('js/angular-route.min.js')}}"></script>
<script src="{{asset('js/angular-sanitize.min.js')}}"></script>
<script src="{{asset('js/app/app.js')}}"></script>
<script src="{{asset('js/app/services/messageFactory.js')}}"></script>
<script src="{{asset('js/app/services/RxEyewearFactory.js')}}"></script>
<script src="{{asset('js/app/controller/RxEyewearProductController.js')}}"></script>

@endsection
