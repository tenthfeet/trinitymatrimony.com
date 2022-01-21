@extends('layouts.app')

@section('content')

<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.html"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">Login <label for="edit-name" </li>
            </ul>
        </div>
        <div class="services">
            <div class="col-sm-6 login_left">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-item form-type-textfield form-item-name">
                        <label for="edit-name">Email Address *</label>
                        <input type="text" name="email" value="{{ old('email') }}" size="60" maxlength="60" class="form-text @error('email') border-red @enderror">
                        @error('email')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-item form-type-password form-item-pass">
                        <label for="edit-pass">Password *</label>
                        <input type="password" name="password" size="60" maxlength="128" class="form-text @error('password') border-red @enderror">
                        @error('password')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Log in" class="btn_1 submit">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection