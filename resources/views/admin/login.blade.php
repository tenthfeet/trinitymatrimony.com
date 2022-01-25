@extends('layouts.log')

@section('content')
    <div class="login-logo">
        <a href="#"><b>Trinity</b>Matrimony</a>
    </div>
    <div class="login-box">

        <div class="card">
            <div class="card-body login-card-body">

                <p class="login-box-msg pb-2">Sign in to start your session</p>
                <div class="text-center mb-3">
                    <img src="{{ asset('images/trinitylogo.jpg') }}" jclass="user-image img-squre img-center"
                        class="rounded mx-auto d-block" style="width:200px;" alt="User Image">
                </div>

                    @error('msg')

                    <div class="alert alert-warning alert-dismissible fade show my-2 text-center" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror

                <form action="{{ route('tmadmin') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    @error('email')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-red" role="alert">
                            {{ $message }}
                        </span>
                    @enderror

                    

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="my-2 mx-auto">
                            <a href="{{ route('password.request') }}" class="text-red">I forgot my password</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
