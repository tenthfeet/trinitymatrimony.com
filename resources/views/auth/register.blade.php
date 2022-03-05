@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="banner-infhny">

            <h6 class="mb-3"></h6>
            <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                <form action="{{ route('register') }}" method="post" class="booking-form">
                    @csrf
                    <h3 class="ml-2">Register</h3>
                    <div class="row book-form">
                        <div class="form-input col-md-5  mt-3">
                            <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="First name"
                                maxlength="60" class="form-text @error('firstname') border-red @enderror">
                            @error('firstname')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            {{-- <input type="text" name="" placeholder="First name" required=""> --}}
                        </div>
                        <div class="form-input col-md-5  mt-3">
                            <input type="text" name="surname" value="{{ old('surname') }}" placeholder="Surname"
                                maxlength="60" class="form-text @error('surname') border-red @enderror">
                            @error('surname')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            {{-- <input type="text" name="" placeholder="Surname" required=""> --}}
                        </div>
                    </div>
                    <div class="row book-form">
                        <div class="form-input col-md-5  mt-3">

                            @php
                                echo selectOptionFromArray(Arrays::$gender, 'gender');
                            @endphp
                            @error('gender')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-input col-md-5  mt-3">
                            {{-- <input type="text" name="" placeholder="Mobile" required=""> --}}
                            <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile number"
                                size="60" maxlength="60" class="form-text @error('mobile') border-red @enderror">
                            @error('mobile')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row book-form">
                        <div class="form-input col-md-10  mt-3">
                            <input type="text" id="edit-email" name="email" value="{{ session('reg_email') }}"
                                placeholder="Email ID" size="60" maxlength="60"
                                class="form-text @error('email') border-red @enderror" readonly>
                            @error('email')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            {{-- <input type="text" name="" placeholder="Email" required=""> --}}
                        </div>
                    </div>


                    <div class="row book-form">
                        <div class="form-input col-md-5  mt-3">
                            <input type="password" id="edit-pass" name="password" placeholder="Password" size="60"
                                maxlength="128" class="form-text @error('password') border-red @enderror">
                            @error('password')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            {{-- <input type="text" name="" placeholder="Password" required=""> --}}
                        </div>
                        <div class="form-input col-md-5  mt-3">
                            <input type="password" id="edit-cpass" name="password_confirmation"
                                placeholder="Confirm Password" size="60" maxlength="128" class="form-text">
                            {{-- <input type="text" name="" placeholder="Confirm Password" required=""> --}}
                        </div>
                        <div class="bottom-btn col-md-4 mt-3">
                            <button class="btn btn-style btn-secondary">Register</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>












    {{-- <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">
                <ul>
                    <a href="{{ url('/') }}"><i class="fa fa-home home_1"></i></a>
                    <span class="divider">&nbsp;|&nbsp;</span>
                    <li class="current-page">Register</li>
                </ul>
            </div>
            <div class="services">
                <div class="col-sm-6 login_left">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit-name">Firstname *</label>
                                    <input type="text" name="firstname" value="{{ old('firstname') }}" size="60"
                                        maxlength="60" class="form-text @error('firstname') border-red @enderror">
                                    @error('firstname')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit-name">Surname *</label>
                                    <input type="text" name="surname" value="{{ old('surname') }}" size="60"
                                        maxlength="60" class="form-text @error('surname') border-red @enderror">
                                    @error('surname')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edit-name">Email *</label>
                            <input type="text" id="edit-email" name="email" value="{{ session('reg_email') }}" size="60"
                                maxlength="60" class="form-text @error('email') border-red @enderror" readonly>
                            @error('email')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit-name">Mobile no *</label>
                            <input type="text" name="mobile" value="{{ old('mobile') }}" size="60" maxlength="60"
                                class="form-text @error('mobile') border-red @enderror">
                            @error('mobile')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit-pass">Password *</label>
                                    <input type="password" id="edit-pass" name="password" size="60" maxlength="128"
                                        class="form-text @error('password') border-red @enderror">
                                    @error('password')
                                        <span class="text-red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit-pass">Confirm Password *</label>
                                    <input type="password" id="edit-cpass" name="password_confirmation" size="60"
                                        maxlength="128" class="form-text">
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="REGISTER" class="btn_1 submit">
                        </div>
                    </form>

                </div>
                <div class="col-sm-6">

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div> --}}
@endsection
