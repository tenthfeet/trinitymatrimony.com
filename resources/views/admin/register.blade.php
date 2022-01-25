@extends('layouts.admin')

@section('breadcrumb')
    <x-admin.breadcrumbs page="Admin Registration" />
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title text-primary"><b>Add Users </b></h3>
                <a href="{{ url('/tmadmin/adminlist') }}" class="btn btn-primary btn-sm" style="float:right;">List</a>
            </div>
            <div class="card-body">
                <form id="user-reg" action="" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Name</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('name') border-red @enderror" type="text" id="name" name="name" value="{{old('name')}}">
                        </div>
                        @error('name')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Email</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('email') border-red @enderror" type="email" id="email" name="email" value="{{old('email')}}">
                        </div>
                        @error('email')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class=" row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Password</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('password') border-red @enderror" type="text" id="password" name="password" value="{{old('password')}}">
                        </div>
                        @error('password')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- <div class=" row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Confirm Password</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('password') border-red @enderror" type="password" id="password_confirmation" name="password_confirmation" >
                        </div>
                        
                    </div> --}}

                    <div class=" row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Mobile</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('mobile') border-red @enderror" type="number" id="mobile" name="mobile" value="{{old('mobile')}}">
                        </div>
                        @error('mobile')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class=" row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Status</label>
                        </div>
                        <div class="col-md-4">
                            @php
                                echo arrayToSelectOption(Arrays::$status, 'status', 'form-control');
                            @endphp
                        </div>
                    </div>


                    <div class="row">
                        <button id="save" type="submit" class="btn btn-primary mx-auto my-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
