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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="edit-name">Firstname *</label>
                                <input type="text"  name="firstname" value="{{ old('firstname') }}" size="60" maxlength="60" class="form-text @error('firstname') border-red @enderror">
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
                                <input type="text"  name="surname" value="{{ old('surname') }}" size="60" maxlength="60" class="form-text @error('surname') border-red @enderror">
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
                        <input type="text" id="edit-email" name="email" value="{{session('reg_email')}}" size="60" maxlength="60" class="form-text @error('email') border-red @enderror" readonly>
                        @error('email')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-name">Mobile no *</label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}" size="60" maxlength="60" class="form-text @error('mobile') border-red @enderror">
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
                                <input type="password" id="edit-pass" name="password" size="60" maxlength="128" class="form-text @error('password') border-red @enderror">
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
                                <input type="password" id="edit-cpass" name="password_confirmation" size="60" maxlength="128" class="form-text">
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
</div>

@endsection