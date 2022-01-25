@extends('layouts.admin')

@section('breadcrumb')
    <x-admin.breadcrumbs page="List of Administrators" />
@endsection

@section('content')
    Admin List
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
