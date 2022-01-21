@extends('layouts.app')

@section('content')
<div class="grid_3">
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
                <form method="POST" action="{{ url('/verify') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="edit-name">OTP *</label>
                        <input type="number"  name="otp" value="" size="60" maxlength="60" class="form-text">
                        <input type="hidden" name="email" value="{{session('reg_email')}}">
                        
                        @error('msg')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    

                    <div class="form-actions">
                        <input type="submit" value="VERIFY" class="btn_1 submit">
                    </div>
                </form>

            </div>
            <div class="col-sm-6">

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection