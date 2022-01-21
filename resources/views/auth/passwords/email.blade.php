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
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
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
                    <div class="form-actions">
                        <input type="submit" value="Send Password Reset Link" class="btn_1 submit">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection