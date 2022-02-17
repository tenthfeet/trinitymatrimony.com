@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="banner-infhny">
            <h6 class="mb-3"></h6>
            <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                <form action="{{ url('/registration') }}" method="post" class="booking-form">
                    @csrf
                    <div kclass="row book-form">
                        <h3 class="ml-2">Register</h3>

                        <div class="form-input col-md-6  mt-3">
                            <input type="text" name="email" value="" placeholder="Email"
                                class="@error('email') border-red @enderror">
                            @error('email')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="bottom-btn col-md-4 mt-3">
                            <button class="btn btn-style btn-secondary">Send OTP</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
