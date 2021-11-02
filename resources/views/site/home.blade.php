@extends('site.layout')

@section('title','Home')


@section('content')

  <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-6">
                        <div class="slider_text ">
                            <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" >{{$front_config['title']}}</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">{{$front_config['subtitle']}}</p>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

@endsection