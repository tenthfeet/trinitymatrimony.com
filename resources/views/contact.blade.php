@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">Contact Us</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->



    <!-- contact-form -->
    <section class="w3l-contact" id="contact">
        <div class="contact-infubd py-5">
            <div class="container py-lg-5">
                @if (session()->has('success'))
                    <div class="alert alert-success my-4" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="alert alert-success my-4" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                <div class="contact-grids row">
                    <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
                        {{-- <h4 class="mb-4 text-theme">Enquiry Form</h4> --}}
                        <form action="#" method="post" class="signin-form">
                            @csrf
                            <div class="input-grids">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input class="@error('name') border-red @enderror" type="text" name="name" id="name"
                                        value="{{ old('name') }}" class="contact-input" required>
                                    @error('name')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input class="@error('email') border-red @enderror" type="email" name="email" id="email"
                                        value="{{ old('email') }}" class="contact-input" required>
                                    @error('email')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject*</label>
                                    <input class="@error('subject') border-red @enderror" type="text" name="subject"
                                        id="subject" value="{{ old('subject') }}" class="contact-input" required>
                                    @error('subject')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message*</label>
                                <textarea class="@error('message') border-red @enderror" name="message" id="message"
                                    required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="text-left">
                                <button class="btn btn-style btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 contact-left">
                        <div class="partners">
                            <div class="cont-details">
                                <h5 class="text-theme">Get in touch</h5>
                                <p class="mt-3 mb-4">Hi there, We are available 24/7 by e-mail or by phone. Drop
                                    us line so we can talk
                                    futher about that.</p>
                            </div>
                            <div class="hours">
                                <h6 class="mt-4">Email:</h6>
                                <p> <a href="mailto:{{ trinity_email }}">
                                        {{ trinity_email }}</a></p>
                                <h6 class="mt-4">Visit Us:</h6>
                                <p> @php
                                    echo trinity_address;
                                @endphp</p>
                                <h6 class="mt-4">Contact:</h6>
                                <p class="margin-top"><a href="tel:+44-255-366-88">{{ trinity_mobile }}</a></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="map mt-5 pt-md-5">
                    <h5>Map</h5>
                    <iframe
                        src="https://maps.google.com/maps?q=holy%20trinity%20cathedral,%20ramanathapuram,%20coimbatore&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
    </section>
    <!-- /contact-form -->
@endsection
