@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">Reset Password</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Reset Password </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->


    <!-- contact-form -->
    <section class="w3l-contact" id="contact">
        <div class="contact-infubd py-5">
            <div class="container py-lg-3">
                <div class="contact-grids row">
                    <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
                        <form action="{{ route('password.update') }}" method="post" class="signin-form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="input-grids">
                                <div class="form-group">
                                    <label for="edit-name">Email Address *</label>
                                    <input type="text" name="email" value="{{ $email ?? old('email') }}"
                                        placeholder="Email Address" size="60" maxlength="60"
                                        class="form-text @error('email') border-red @enderror" readonly>
                                    @error('email')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    {{-- <input type="text" name="w3lName" id="w3lName" placeholder="Your Name*"
                                        class="contact-input" /> --}}
                                </div>
                                <div class="form-group">
                                    <label for="edit-name">Password *</label>
                                    <input type="password" name="password" size="60" maxlength="60" 
                                        class="form-text @error('password') border-red @enderror">
                                    @error('password')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="edit-name">Confirm Password *</label>
                                    <input type="password" name="password_confirmation" size="60" maxlength="60"
                                        class="form-text" >
                                </div>
                            </div>
                            
                            <div class="text-left">
                                <button class="btn btn-style btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 contact-left">
                        <div class="partners">
                            <div class="cont-details">
                                <h5>Get in touch</h5>
                                <p class="mt-3 mb-4">Hi there, We are available 24/7 by fax, e-mail or by phone. Drop
                                    us line so we can talk
                                    futher about that.</p>
                            </div>
                            <div class="hours">
                                <h6 class="mt-4">Email:</h6>
                                <p> <a href="mailto:mail@traversal.com">
                                        mail@traversal.com</a></p>
                                <h6 class="mt-4">Visit Us:</h6>
                                <p> 78-80 Upper St Giles St. Norwich NR2 1LT United Kingdom.</p>
                                <h6 class="mt-4">Contact:</h6>
                                <p class="margin-top"><a href="tel:+44-255-366-88">+44-255-366-88</a></p>
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
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-item form-type-textfield form-item-name">
                        <label for="edit-name">Email Address *</label>
                        <input type="text" name="email" value="{{ $email ?? old('email') }}" size="60" maxlength="60" class="form-text @error('email') border-red @enderror" readonly>
                        @error('email')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-item form-type-textfield form-item-name">
                        <label for="edit-name">Password *</label>
                        <input type="password" name="password"  size="60" maxlength="60" class="form-text @error('password') border-red @enderror">
                        @error('password')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-item form-type-textfield form-item-name">
                        <label for="edit-name">Confirm Password *</label>
                        <input type="password" name="password_confirmation"  size="60" maxlength="60" class="form-text">
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Reset Password" class="btn_1 submit">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div> --}}
@endsection
