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
                <form method="POST" action="{{ url('/registration') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="edit-name">Email *</label>
                        <input type="text" id="edit-email" name="email" value="" size="60" maxlength="60" class="form-text @error('email') border-red @enderror">
                        @error('email')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    

                    <div class="form-actions">
                        <input type="submit" value="SEND OTP" class="btn_1 submit">
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