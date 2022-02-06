<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <link href="{{ asset('css/bootstrap-3.1.1.min.css') }}" rel='stylesheet' type='text/css' />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <!----font-Awesome----->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.flexisel.js') }}"></script>
    <style>
        .dflexisel {
            width: 280px;
            height: 160px;
        }

    </style>

</head>

<body>
    <x-header />
    <!-- end navbar-inverse-blue -->
    <div class="banner">
        <div class="container">
            <div class="banner_info">
                <h3>Find your soulmate</h3>
                <a href="{{ url('/updateprofile') }}" class="hvr-shutter-out-horizontal">Create your Profile</a>
            </div>
        </div>

        <div class="profile_search">
            <div class="container wrap_1">
                <form action="{{url('/search')}}" method="post">
                    @csrf
                    <div class="search_top">
                        <div class="inline-block">
                            <label class="gender_1">I am looking for :</label>
                            <div class="age_box1" style="max-width: 100%; display: inline-block;">
                                @php
                                    echo arrayToSelectOption(Arrays::$lookingFor, 'gender', '', 'required', '', 'Gender');
                                @endphp
                            </div>
                        </div>
                        <div class="inline-block">
                            <label class="gender_1">Education :</label>
                            <div class="age_box1" style="max-width: 100%; display: inline-block;">
                                @php
                                    echo arrayToSelectOption(Arrays::$qualification, 'qualification', '', '', '', 'Edu. Qual.');
                                @endphp
                            </div>
                        </div>

                    </div>
                    <div class="inline-block">
                        <div class="age_box2" style="max-width: 220px;">
                            <label class="gender_1">Age :</label>
                            <input class="transparent" name="from" placeholder="From:" style="width: 34%;" type="number"
                                value="" max="60">&nbsp;-&nbsp;<input name="to" class="transparent" placeholder="To:"
                                style="width: 34%;" type="number" value="" max="60">
                        </div>
                    </div>
                    <div class="inline-block">
                        <label class="gender_1">Annual Income :</label>
                        <div class="age_box1" style="max-width: 100%; display: inline-block;">
                            @php
                                echo arrayToSelectOption(Arrays::$income, 'income', '', '', '', 'Income');
                            @endphp
                        </div>
                    </div>
                    <div class="submit inline-block">
                        <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="grid_1">
        <div class="container">
            <h1>Latest Profiles</h1>
            <div class="heart-divider">
                <span class="grey-line"></span>
                <i class="fa fa-heart pink-heart"></i>
                <i class="fa fa-heart grey-heart"></i>
                <span class="grey-line"></span>
            </div>
            <ul id="flexiselDemo3">
                <li>
                    <div class="col_1">
                        <a href="#">
                            <img src="{{ asset('images/1.jpg') }}" alt=""
                                class="hover-animation image-zoom-in img-responsive flexisel" />
                            <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                                <div class="center-middle">Know More</div>
                            </div>
                            <h3><span class="m_3">ID : MI-387412</span><br>28, Software Engineer,
                                Coimbatore<br>
                            </h3>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="col_1">
                        <a href="#">
                            <img src="{{ asset('images/p2.jpg') }}" alt=""
                                class="flexisel hover-animation image-zoom-in img-responsive" />
                            <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                                <div class="center-middle">Know More</div>
                            </div>
                            <h3><span class="m_3">ID : MI-387412</span><br>25, Doctor, Chochin<br></h3>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="col_1">
                        <a href="#">
                            <img src="{{ asset('images/a5.jpg') }}" alt=""
                                class=" flexisel hover-animation image-zoom-in img-responsive" />
                            <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                                <div class="center-middle">Know More</div>
                            </div>
                            <h3><span class="m_3">ID : MI-387412</span><br>28, Software Engineer,
                                Coimbatore<br>
                            </h3>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="col_1">
                        <a href="#">
                            <img src="{{ asset('images/p4.jpg') }}" alt=""
                                class="flexisel hover-animation image-zoom-in img-responsive" />
                            <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                                <div class="center-middle">Know More</div>
                            </div>
                            <h3><span class="m_3">ID : MI-387412</span><br>25, Doctor, Chochin<br></h3>
                        </a>
                    </div>
                </li>

            </ul>
            <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo3").flexisel({
                        visibleItems: 6,
                        animationSpeed: 1000,
                        autoPlay: false,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
            </script>
        </div>
    </div>

    <!-- Success stories -->

    <div class="grid_2">
        <div class="container">
            <h2>Success Stories</h2>
            <div class="heart-divider">
                <span class="grey-line"></span>
                <i class="fa fa-heart pink-heart"></i>
                <i class="fa fa-heart grey-heart"></i>
                <span class="grey-line"></span>
            </div>
            <div class="row_1">
                <div class="col-md-8 suceess_story">
                    <ul>
                        <li>
                            <div class="suceess_story-date">
                                <span class="entry-1">Nov 17, 2021</span>
                            </div>
                            <div class="suceess_story-content-container">
                                <figure class="suceess_story-content-featured-image">
                                    <img width="75" height="75" src="{{ asset('images/7.jpg') }}"
                                        class="img-responsive" alt="" />
                                </figure>
                                <div class="suceess_story-content-info">
                                    <h4><a href="#">Juliet & Romeo</a></h4>
                                    <p>Marriage is a life long journey that thrives on love, commitment, trust, respect,
                                        communication, patience..
                                        Really thankful to TRINITY MATRIMONY. really happy..thank U.<a
                                            href="#">More...</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="suceess_story-date">
                                <span class="entry-1">Nov 17, 2021</span>
                            </div>
                            <div class="suceess_story-content-container">
                                <figure class="suceess_story-content-featured-image">
                                    <img width="75" height="75" src="images/7.jpg" class="img-responsive" alt="" />
                                </figure>
                                <div class="suceess_story-content-info">
                                    <h4><a href="#">Juliet & Romeo</a></h4>
                                    <p>Marriage is a life long journey that thrives on love, commitment, trust, respect,
                                        communication, patience..
                                        Really thankful to TRINITY MATRIMONY. really happy..thank U.<a
                                            href="#">More...</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="suceess_story-date">
                                <span class="entry-1">Nov 17, 2021</span>
                            </div>
                            <div class="suceess_story-content-container">
                                <figure class="suceess_story-content-featured-image">
                                    <img width="75" height="75" src="images/7.jpg" class="img-responsive" alt="" />
                                </figure>
                                <div class="suceess_story-content-info">
                                    <h4><a href="#">Juliet & Romeo</a></h4>
                                    <p>Marriage is a life long journey that thrives on love, commitment, trust, respect,
                                        communication, patience..
                                        Really thankful to TRINITY MATRIMONY. really happy..thank U.<a
                                            href="#">More...</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="suceess_story-date">
                                <span class="entry-1">Nov 17, 2021</span>
                            </div>
                            <div class="suceess_story-content-container">
                                <figure class="suceess_story-content-featured-image">
                                    <img width="75" height="75" src="images/7.jpg" class="img-responsive" alt="" />
                                </figure>
                                <div class="suceess_story-content-info">
                                    <h4><a href="#">Juliet & Romeo</a></h4>
                                    <p>Marriage is a life long journey that thrives on love, commitment, trust, respect,
                                        communication, patience..
                                        Really thankful to TRINITY MATRIMONY. really happy..thank U.<a
                                            href="#">More...</a></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="suceess_story-date">
                                <span class="entry-1">Nov 17, 2021</span>
                            </div>
                            <div class="suceess_story-content-container">
                                <figure class="suceess_story-content-featured-image">
                                    <img width="75" height="75" src="images/7.jpg" class="img-responsive" alt="" />
                                </figure>
                                <div class="suceess_story-content-info">
                                    <h4><a href="#">Juliet & Romeo</a></h4>
                                    <p>Marriage is a life long journey that thrives on love, commitment, trust, respect,
                                        communication, patience..
                                        Really thankful to TRINITY MATRIMONY. really happy..thank U.<a
                                            href="#">More...</a></p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <!-- Guest Messages -->

    <div class="bg">
        <div class="container">
            <h3>Guest Messages</h3>
            <div class="heart-divider">
                <span class="grey-line"></span>
                <i class="fa fa-heart pink-heart"></i>
                <i class="fa fa-heart grey-heart"></i>
                <span class="grey-line"></span>
            </div>
            <div class="col-sm-6">
                <div class="bg_left">
                    <h4>But I must explain</h4>
                    <h5>Friend of Bride</h5>
                    <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                        beatae vitae dicta sunt explicabo.</p>
                    <ul class="team-socials">
                        <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                        <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                        <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bg_left">
                    <h4>But I must explain</h4>
                    <h5>Friend of Groom</h5>
                    <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                        beatae vitae dicta sunt explicabo.</p>
                    <ul class="team-socials">
                        <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
                        <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
                        <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>


    <x-footer />
</body>

</html>
