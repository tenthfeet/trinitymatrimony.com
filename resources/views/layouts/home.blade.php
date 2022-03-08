<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    {{-- css --}}
    <link href="{{ asset('css/style-starter.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

    </style>

</head>

<body>
    <x-header />
    <!--banner-slider-->
    <!-- main-slider -->
    <section class="w3l-main-slider" id="home">
        <div class="banner-content">
            <div id="demo-1"
                data-zs-src='["{{ asset('images/banner1.jpg') }}", "{{ asset('images/banner2.jpg') }}","{{ asset('images/banner3.jpg') }}", "{{ asset('images/banner4.jpg') }}"]'
                data-zs-overlay="dots">
                <div class="demo-inner-content">

                    @yield('content')

                </div>
            </div>
        </div>
    </section>
    <!-- /main-slider -->
    <!-- //banner-slider-->

    <!--/grids-->
    <section id="search_div" class="w3l-grids-3 py-5">
        <div class="container py-md-5">
            <div class="title-content text-left mb-lg-5 mb-4">
                {{-- <h6 class="sub-title">Visit</h6> --}}
                <h3 id="s_heading" class="hny-title">Latest Profiles</h3>
            </div>
            <div id="s_result" class="row bottom-ab-grids">
                <!--/row-grids-->
                @php
                    echo profileCards($data['latest']->toArray());
                @endphp
                
                <!--//row-grids-->
            </div>
        </div>
    </section>
    <!--//grids-->

    <!--/-->
    <div class="best-rooms py-5">
        <div class="container py-md-5">
            <div class="ban-content-inf row">
                <div class="maghny-gd-1 col-lg-6">
                    <div class="maghny-grid">
                        <figure class="effect-lily border-radius  m-0">
                            <img class="img-fluid" src="{{ asset('images/Pope_Francis.jpg') }}" alt="" />
                            <figcaption>
                                <div>
                                    <h4>His Holiness</h4>
                                    <h4>POPE FRANCIS</h4>
                                </div>

                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="maghny-gd-1 col-lg-6 mt-lg-0 mt-4">
                    <div class="row">
                        <div class="maghny-gd-1 col-6">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('images/george-alencherr.jpg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4 style="font-size: 16px;">George Cardinal Alencherry</h4>
                                            {{-- <h4>GEORGE CARDINAL ALENCHERRY</h4> --}}
                                            {{-- <p>From 1220$ </p> --}}
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="maghny-gd-1 col-6">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('images/Mar-Andrews-Thazhath.jpg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4 style="font-size: 16px;">Mar Andrews Thazhath</h4>
                                            {{-- <p>From 1620$ </p> --}}
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="maghny-gd-1 col-6 mt-4">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('images/alappatt.jpg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4 style="font-size: 16px;">Mar Paul Alappatt</h4>
                                            {{-- <p>From 1820$ </p> --}}
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="maghny-gd-1 col-6 mt-4">
                            <div class="maghny-grid">
                                <figure class="effect-lily border-radius">
                                    <img class="img-fluid" src="{{ asset('images/puttur.jpeg') }}" alt="" />
                                    <figcaption>
                                        <div>
                                            <h4 style="font-size: 16px;">V.Rev.Fr. Joseph Puthur</h4>
                                            {{-- <p>From 1520$ </p> --}}
                                        </div>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //stats -->

    <!-- testimonials -->
    <section class="w3l-clients" id="clients">
        <!-- /grids -->
        <div class="cusrtomer-layout py-5">
            <div class="container py-lg-4 py-md-3 pb-lg-0">
                <div class="heading text-center mx-auto">
                    <h6 class="sub-title text-center">Few of our Successful Couple says</h6>
                    <h3 class="hny-title mb-md-5 mb-4">our couples do the talking</h3>
                </div>
                <!-- /grids -->
                <div class="testimonial-width">
                    <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
                        @foreach ($data['testimonial'] as $item)
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <span class="fa fa-quote-left" aria-hidden="true"></span>
                                        {{$item->content}}
                                    </blockquote>
                                    <div class="testi-des">
                                        {{-- <div class="test-img"><img src="{{ asset('images/c1.jpg') }}"
                                                class="img-fluid" alt="client-img">
                                        </div> --}}
                                        <div class="peopl align-self">
                                            <h3>{{$item->name}}</h3>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /grids -->
        </div>
        <!-- //grids -->
    </section>
    <!-- //testimonials -->
    
    <x-footer />


    <!-- Template JavaScript -->
    <script src="{{ asset('js2/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js2/theme-change.js') }}"></script>
    <!--/slider-js-->
    <script src="{{ asset('js2/jquery.min.js') }}"></script>
    <script src="{{ asset('js2/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('js2/jquery.zoomslider.min.js') }}"></script>
    <!--//slider-js-->
    <script src="{{ asset('js2/owl.carousel.js') }}"></script>
    <!-- stats number counter-->
    <script src="{{ asset('js2/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js2/jquery.countup.js') }}"></script>
    <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
    <!-- //stats number counter -->

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>

    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function() {
            $("#owl-demo1").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    736: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 2,
                        nav: false,
                        loop: true
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->

    <script>
        $('.counter').countUp();
    </script>

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->
    @yield('script')
</body>

</html>
