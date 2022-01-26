@extends('layouts.admin')

@section('breadcrumb')
    <x-admin.breadcrumbs page="List of Administrators" />
@endsection

@section('content')
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title text-primary"><b>List of Administrators </b></h3>
                <a href="{{ url('/tmadmin/register') }}" class="btn btn-primary btn-sm" style="float:right;">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$user->firstname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->status}}</td>
                                    <td><a class="btn btn-sm btn-primary py-0" href="{{url('/tmadmin/register/'.$user->id)}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>
     $("#dataTable").DataTable();
</script>
@endsection
