@extends('layouts.admin')

@section('breadcrumb')
    <x-admin.breadcrumbs page="User Registration" />
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title text-primary"><b>Add User </b></h3>
                <a href="{{ url('/tmadmin/userlist') }}" class="btn btn-primary btn-sm" style="float:right;">List</a>
            </div>
            <div class="card-body">

                @if (session()->has('msg'))
                    <div class="alert alert-info">
                        {{ session('msg') }}
                    </div>
                @endif

                <form id="user-reg" action="" method="post">
                    @csrf

                    @if (request()->route()->id)
                        <input type="hidden" name="id" value="{{ request()->route()->id }}">
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">First Name</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('firstname') border-red @enderror" type="text" id="firstname"
                                name="firstname"
                                value="{{ request()->route()->id ? $data->firstname : old('firstname') }}">
                        </div>
                        @error('firstname')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Surname</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('surname') border-red @enderror" type="text" id="surname"
                                name="surname" value="{{ request()->route()->id ? $data->surname : old('surname') }}">
                        </div>
                        @error('surname')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Gender</label>
                        </div>
                        <div class="col-md-4">
                            @php
                                $v = request()->route()->id ? $data->gender : old('gender');
                                $c = $errors->has('gender') ? 'form-control border-red' : 'form-control';
                                echo selectOptionFromArray(Arrays::$gender, 'gender', $c, '', $v, 'Gender');
                            @endphp
                        </div>

                        @error('gender')
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
                            <input class="form-control @error('email') border-red @enderror" type="email" id="email"
                                name="email" value="{{ request()->route()->id ? $data->email : old('email') }}">
                        </div>
                        @error('email')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    @if (!request()->route()->id)
                        <div class=" row">
                            <div class="col-md-4 form-group">
                                <label class="float-right col-form-label">Password</label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control @error('password') border-red @enderror" type="password"
                                    id="password" name="password" value="{{ old('password') }}">
                            </div>
                            @error('password')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class=" row">
                            <div class="col-md-4 form-group">
                                <label class="float-right col-form-label">Confirm Password</label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control @error('password') border-red @enderror" type="text" id="password_confirmation" name="password_confirmation" >
                            </div>
                        </div>
                    @endif

                    <div class=" row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Mobile</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('mobile') border-red @enderror" type="number" id="mobile"
                                name="mobile" value="{{ request()->route()->id ? $data->mobile : old('mobile') }}">
                        </div>
                        @error('mobile')
                            <span class="text-red" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- <div class=" row">
                        <div class="col-md-4 form-group">
                            <label class="float-right col-form-label">Status</label>
                        </div>
                        <div class="col-md-4">
                            @php
                                $v = request()->route()->id ? $data->status : '';
                                echo selectOptionFromArray(Arrays::$status, 'status', 'form-control', '', $v);
                            @endphp
                        </div>
                    </div> --}}


                    <div class="row">
                        <button id="save" type="submit" class="btn btn-primary mx-auto my-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
