@extends('layouts.admin')

@section('breadcrumb')
    <x-admin.breadcrumbs page="Add Testimonial" />
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title text-primary"><b>Add Testimonial</b></h3>
                <a href="{{ url('/tmadmin/testimonial_list') }}" class="btn btn-primary btn-sm"
                    style="float:right;">List</a>
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
                    <div class="row justify-content-center">
                        <div class="col-md-5 form-group">
                            <label class="col-form-label">Name</label>
                            <input class="form-control @error('name') border-red @enderror" type="text" id="name"
                                name="name" value="{{ request()->route()->id ? $data->name : old('name') }}">
                            @error('name')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-5 form-group">
                            <label class="col-form-label">Comments</label>
                            <textarea class="form-control @error('content') border-red @enderror" name="content"
                                id="content" cols="30"
                                rows="4">{{ request()->route()->id ? $data->content : old('content') }}</textarea>
                            @error('content')
                                <span class="text-red" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button id="save" type="submit" class="btn btn-primary mx-auto my-4">{{ request()->route()->id ? 'Update' : 'Save' }}</button>
                    </div>



                </form>
            </div>
        </div>
    </div>
@endsection
