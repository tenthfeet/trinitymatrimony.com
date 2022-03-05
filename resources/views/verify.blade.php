@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="banner-infhny">
            @if (session()->has('otp_res'))
                <div class="alert alert-success my-1" role="alert">
                    {{ session()->get('otp_res') }}
                </div>
            @endif
            <h6 class="mb-3"></h6>
            <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                <form action="{{ url('/verify') }}" method="post" class="booking-form">
                    @csrf

                    <div kclass="row book-form">
                        <h3 class="ml-2">Register</h3>

                        <div class="form-input col-md-6  mt-3">
                            <input type="number" name="otp" value="" placeholder="OTP" <input type="hidden" name="mobile"
                                value="{{ session('reg_mobile') }}">

                            @error('msg')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="bottom-btn col-md-4 mt-3">
                            <button class="btn btn-style btn-secondary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
