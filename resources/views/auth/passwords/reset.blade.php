@extends('layouts.app')

@section('content')


<div class="grid_3">
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
</div>

@endsection