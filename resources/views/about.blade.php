@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">About Us</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->

    <!-- /about-6-->
    <section class="w3l-cta4 py-5">
        <div class="container py-lg-5">
            <div class="ab-section text-center">
                <h6 class="sub-title">About Us</h6>
                <h3 class="hny-title">"Therefore I tell you, whatever you ask for in prayer, believe that you have received it, and it will be yours."</h3>
                <p class="py-3 mb-3">- Mark 11:24</p>
            </div>
            <div class="row mt-5">
                <div class="col-md-9 mx-auto">
                    <img src="{{ asset('images/banner3.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- //about-6-->


    <section class="w3l-grids1">
        <div class="hny-three-grids py-5">
            <div class="container py-lg-5">
                <div class="row">
                    <div class="col-md-4 col-sm-6 mt-0 grids5-info">
                        <a href="#url"><img src="{{ asset('images/Mar-Andrews-Thazhath.jpg') }}" class="img-fluid" alt=""></a>
                        <h5>Mar Andrews Thazhath</h5>
                        {{-- <h4><a href="#url">Investor Relations</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam esse? dolores impedit doloremque.
                        </p> --}}
                    </div>
                    <div class="col-md-4 col-sm-6 mt-sm-0 mt-5 grids5-info">
                        <a href="#url"><img src="{{ asset('images/alappatt.jpg') }}" class="img-fluid" alt=""></a>
                        <h5>Mar Paul Alappatt</h5>
                        {{-- <h4><a href="#url">
                                Partner With Care</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam esse? dolores impedit doloremque.
                        </p> --}}
                    </div>
                    <div class="col-md-4 col-sm-6 mt-md-0 mt-5 grids5-info">
                        <a href="#url"><img src="{{ asset('images/puttur.jpeg') }}" class="img-fluid" alt=""></a>
                        <h5>V.Rev.Fr. Joseph Puthur</h5>
                        {{-- <h4><a href="#url">Customer Care</a></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam esse? dolores impedit doloremque.
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- stats -->
    <section class="w3l-statshny py-5" id="stats">
        <div class="container py-lg-5 py-md-4">
            <div class="w3-stats-inner-info">
                <div class="row">
                    <div class="col-lg-4 col-6 stats_info counter_grid text-left">
                        <span class="fa fa-male"></span>
                        <p class="counter">530</p>
                        <h4>Grooms</h4>
                    </div>
                    <div class="col-lg-4 col-6 stats_info counter_grid1 text-left">
                        <span class="fa fa-female"></span>
                        <p class="counter">430</p>
                        <h4>Brides</h4>
                    </div>
                    <div class="col-lg-4 col-6 stats_info counter_grid mt-lg-0 mt-5 text-left">
                        <span class="fa fa-heart"></span>
                        <p class="counter">334</p>
                        <h4>Weddings</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //stats -->

	<!-- team -->
	<section class="w3l-team" id="team">
		<div class="team-block py-5">
		  <div class="container py-lg-5">
			<div class="title-content text-center mb-lg-3 mb-4">
			  <h6 class="sub-title">Our team</h6>
			  {{-- <h3 class="hny-title">Meet our Guides</h3> --}}
			</div>
			<div class="row">
			  <div class="col-lg-3 col-6 mt-lg-5 mt-4">
				<div class="box16">
				  <a href="#url"><img src="{{ asset('images/george-alencherr.jpg') }}" alt="" class="img-fluid" /></a>
				  <div class="box-content">
					{{-- <h3 class="title"><a href="#url">George Cardinal Alencherry</a></h3>
					<span class="post">Description</span> --}}
				  </div>
				</div>
			  </div>
			  <div class="col-lg-3 col-6 mt-lg-5 mt-4">
				<div class="box16">
				  <a href="#url"><img src="{{ asset('images/Mar-Andrews-Thazhath.jpg') }}" alt="" class="img-fluid" /></a>
				  <div class="box-content">
					{{-- <h3 class="title"><a href="#url">Mar Andrews Thazhath</a></h3> --}}
					{{-- <span class="post">Description</span> --}}
				  </div>
				</div>
			  </div>
			  <div class="col-lg-3 col-6 mt-lg-5 mt-4">
				<div class="box16">
				  <a href="#url"><img src="{{ asset('images/alappatt.jpg') }}" alt="" class="img-fluid" /></a>
				  <div class="box-content">
					{{-- <h3 class="title"><a href="#url">Mar Paul Alappatt</a></h3> --}}
					{{-- <span class="post">Description</a></span> --}}
				  </div>
				</div>
			  </div>
			  <div class="col-lg-3 col-6 mt-lg-5 mt-4">
				<div class="box16">
				  <a href="#url"><img src="{{ asset('images/puttur.jpeg') }}" alt="" class="img-fluid" /></a>
				  <div class="box-content">
					{{-- <h3 class="title"><a href="#url">V.Rev.Fr. Joseph Puthur</a></h3> --}}
					{{-- <span class="post">Description</a></span> --}}
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </section>
	  <!-- //team -->
@endsection