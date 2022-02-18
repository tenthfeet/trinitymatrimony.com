@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="banner-infhny">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h3 class="ml-2">Login</h3>
            <div style="margin-top: 1em;">
                @error('msg')
                    <div class="alert alert-info">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                <form action="{{ route('login') }}" method="post" class="booking-form">
                    @csrf
                    <div class="form-input col-md-6  mt-3">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="Username"
                            class="@error('email') border-red @enderror">
                        @error('email')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-input col-md-6  mt-3">
                        <input type="password" name="password" placeholder="Password"
                            class="@error('password') border-red @enderror">
                        @error('password')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>



                    <div class="bottom-btn col-md-4 mt-3">
                        <button class="btn btn-style btn-secondary">Begin</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" style="color:wheat">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
