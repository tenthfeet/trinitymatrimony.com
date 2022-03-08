<footer style="border-top:1px solid #ccc">
    <!-- footer -->
    <section class="w3l-footer">
        <div class="w3l-footer-16-main py-5">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 column">
                        <h3>{{ config('app.name', 'Laravel') }}</h3>
                        <ul class="footer-gd-16">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            {{-- <li><a href="#">Services</a></li> --}}
                            {{-- <li><a href="#">Blog</a></li> --}}
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 column mt-md-0 mt-4">
                        <h3>Useful Links</h3>
                        <ul class="footer-gd-16">
                            <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
                            <li><a href="{{url('/faq')}}">FAQ</a></li>
                            <li><a href="{{url('/privacy')}}">Privacy Policy</a></li>
                            {{-- <li><a href="#">About Company</a></li> --}}
                            {{-- <li><a href="#">Our Packages</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-md-4 column mt-md-0 mt-4">
                        <h3>Our Services</h3>
                        <ul class="footer-gd-16">
                            <li><a href="{{url('/newprofiles')}}">New Matches</a></li>
                            <li><a href="{{url('/viewedprofiles')}}">Viewed Matches</a></li>
                            {{-- <li><a href="#">Services</a></li> --}}
                            {{-- <li><a href="#">Landing Page</a></li> --}}
                            {{-- <li><a href="#">Our Guides</a></li> --}}
                        </ul>
                    </div>

                </div>
                <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
                    <div class="columns text-lg-left text-center">
                        <p>&copy; 2022 TRINITY MATRIMONY. All Rights Reserved | Design & Developed by <a
                                href="http://tenthfeet.com" target="_blank">
                                Tenthfeet.com</a>
                        </p>
                    </div>
                    <div class="columns-2 mt-lg-0 mt-3">
                        <ul class="social">
                            <li><a href="https://www.facebook.com/Ramanathapuram.CBE/"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#"><span class="fa fa-youtube" aria-hidden="true"></span></a>
                            </li>
                            {{-- <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                            </li>
                            <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-angle-up"></span>
        </button>

    </section>
    <!-- //footer -->
</footer>
