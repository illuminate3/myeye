@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row" >
            @include('flash::message')
        </div>
    </div>
   <!-- Use a container to wrap the slider, the purpose is to enable slider to always fit width of the wrapper while window resize -->
       <div class="container-fluid">
           <!-- Jssor Slider Begin -->
           <!-- To move inline styles to css file/block, please specify a class name for each element. -->
           <!-- ================================================== -->
           <div id="slider1_container" style="display: none; position: relative; margin: 0 auto; width: 1920px; height: 1080px; overflow: hidden;" class="hidden-xs">

               <!-- Loading Screen -->
               {{--<div u="loading" style="position: absolute; top: 0px; left: 0px;">--}}
                   {{--<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;--}}

                   {{--background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;">--}}
                   {{--</div>--}}
                   {{--<div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;--}}

                   {{--top: 0px; left: 0px;width: 100%;height:100%;">--}}
                   {{--</div>--}}
               {{--</div>--}}

               <!-- Slides Container -->
               <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px;  width: 1920px; height: 1080px;
               overflow: hidden;" >
                    @if($slide_shows)
                       @foreach($slide_shows as $slide)
                       <div>
                           <img  class="img img-responsive" u="image" src2="{{$slide->image}}"  />
                       </div>
                       @endforeach
                    @endif

               </div>
               <!-- bullet navigator container -->
               <div u="navigator" class="jssorb05" style="bottom: 16px; right: 6px;">
                   <!-- bullet navigator item prototype -->
                   <div u="prototype"></div>
               </div>
               <!-- Arrow Left -->
               <span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;">
               </span>
               <!-- Arrow Right -->
               <span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;">
               </span>
           </div>
           <!-- Jssor Slider End -->
       </div>


    <div class="container hidden-xs" style="margin-top: 1em" >
        <div class="row">
            <style>
                .slider-for {
                    max-width: 860px;
                    margin-left: auto;
                    margin-right: auto;
                    margin-bottom: 6%;
                }
            </style>
            <div class="slider-for" style="text-align:center ;direction: ltr;margin-bottom: 2em">
                @foreach($items as $slide)
                <div style="text-align: center;">
                <h3 style="text-align: center;display: inline-block">
                    {{$slide->title}}
                </h3>
                    @if($slide->type == 0)
                    <a href="/sunEyewear-product/#/suneyewear/{{$slide->material_product_id}}/{{$slide->product_id}}"><img class="img-responsive" src="{{$slide->image_main_front}}" /></a>
                    @else
                    <a href="/eyewear-product/#/rxeyewear/{{$slide->material_product_id}}/{{$slide->product_id}}"><img class="img-responsive" src="{{$slide->image_main_front}}" /></a>
                    @endif
                </div>
                @endforeach

            </div>
            <div class="slider-nav" style="direction: ltr;text-align: center" >
                @foreach($items as $slide)
                <div style="margin: 0 .3em">
                    <img class="img-responsive" width="240px" src="{{$slide->image_main_front}}" />
                </div>
                @endforeach

            </div>


        {{--<div class="center-app " style="direction: ltr">--}}
        {{--@foreach($slide_shows as $slide)--}}

          {{--<div><h3 style="text-align: center">sdfaf</h3><img width="100%" src="{{$slide->image}}" /></div>--}}
        {{--@endforeach--}}

        {{--</div>--}}

        {{--<div class="wrapper">--}}
          {{--<div data-carousel-3d>--}}


          {{--</div>--}}
        {{--</div>--}}

    </div>
    </div>

    <div class="container" style="margin-top: 2em">
        <div class="row">
            <div class="col-lg-12 ">
                {!!$msg->description!!}
            </div>
        </div>
    </div>

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
@endsection
