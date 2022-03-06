@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">Reset Password</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Reset Password
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->

    <!-- contact-form -->
    <section class="w3l-contact" id="contact">
        <div class="contact-infubd py-5">
            <div class="container py-lg-5">
                <div class="contact-grids row">

                    <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
                        <form action="{{ route('password.email') }}" method="post" class="signin-form">
                            @csrf
                            <div class="input-grids">
                                <div class="form-group">
                                    <label for="edit-name">Email Address *</label>
                                    <input type="text" name="email" value="{{ old('email') }}" size="60" maxlength="60"
                                        class="form-text @error('email') border-red @enderror">
                                    @error('email')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-left">
                                <button class="btn btn-style btn-primary">Send Password Reset Link</button>
                            </div>
                        </form>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                    <div class="col-lg-6 contact-left">
                        <div class="partners">
                            <div class="cont-details">
                                <h5 class="text-theme">Get in touch</h5>
                                <p class="mt-3 mb-4">Hi there, We are available 24/7 by fax, e-mail or by phone. Drop
                                    us line so we can talk
                                    futher about that.</p>
                            </div>
                            <div class="hours">
                                <h6 class="mt-4">Email:</h6>
                                <p> <a href="mailto:{{trinity_email}}">
                                    {{trinity_email}}</a></p>
                                <h6 class="mt-4">Visit Us:</h6>
                                <p> @php
                                    echo trinity_address;
                                @endphp</p>
                                <h6 class="mt-4">Contact:</h6>
                                <p class="margin-top"><a href="tel:+44-255-366-88">{{trinity_mobile}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- /contact-form -->

    {{-- <div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="{{url('/')}}"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">Reset Password <label for="edit-name" </li>
            </ul>
        </div>
        <div class="services">
            <div class="col-sm-6 login_left">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-item form-type-textfield form-item-name">
                        <label for="edit-name">Email Address **</label>
                        <input type="text" name="email" value="{{ old('email') }}" size="60" maxlength="60" class="form-text @error('email') border-red @enderror">
                        @error('email')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Send Password Reset Link" class="btn_1 submit">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div> --}}
@endsection
