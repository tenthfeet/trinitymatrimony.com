@extends('layouts.admin')

@section('breadcrumb')
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{url('/tmadmin/dashboard')}}">Dashboard</a></li> --}}
                        <li class="breadcrumb-item active">User Approval</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title text-primary"><b>User Approval</b></h3>
            {{-- <a href="{{ url('/tmadmin/register') }}" class="btn btn-primary btn-sm" style="float:right;">Add</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="22%">Name</th>
                            <th width="20%">Email</th>
                            <th width="10%">Mobile</th>
                            <th width="10%">Status</th>
                            <th width="3%">Mrg status</th>
                            <th width="5%">Paymt Revd</th>
                            <th width="17%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    @if ($user->photo != null)
                                        <a href="#" jdata-toggle="modal" jdata-target="#profilephoto"
                                            onclick="photo('{{ str_replace('\\', '/', asset($user->photo)) }}')">
                                            <img src="{{ asset($user->photo) }}" style="height: 30px;width:30px;">
                                        </a>
                                    @endif
                                    {{ $user->firstname . ' ' . $user->surname }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>
                                    @php
                                        echo selectOptionFromArray(Arrays::$status, 'status-' . $user->id, 'form-control form-control-sm my-0 st', 'onchange="enable_btn(' . $user->id . ')"', $user->status);
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        echo selectOptionFromArray(Arrays::$ny, 'married-' . $user->id, 'form-control form-control-sm my-0 st', 'onchange="enable_btn(' . $user->id . ')"', $user->married);
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        echo selectOptionFromArray(Arrays::$ny, 'pay-' . $user->id, 'form-control form-control-sm my-0 st', 'onchange="enable_btn(' . $user->id . ')"', $user->payment);
                                    @endphp
                                </td>
                                <td>
                                    <button id="{{ $user->id }}" class="btn btn-primary btn-sm py-0"
                                        onclick="update({{ $user->id }})" type="button">SVE</button>
                                    <a class="btn btn-sm btn-primary py-0"
                                        href="{{ url('/tmadmin/register_user/' . $user->id) }}">EDT</a>
                                    <button class="btn btn-primary btn-sm py-0" id="{{ 'del-' . $user->id }}"
                                        onclick="del({{ $user->id }})">DEL</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $data->links() }} --}}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="profilephoto" tabindex="-1" aria-labelledby="profilephoto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <img id="pm" src="" style="max-height: 70vh;">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#dataTable").DataTable();

    function photo(location) {
        $('#profilephoto').modal('show');
        $('#pm').attr("src", location);
    }

    function enable_btn(id) {
        $("#" + id).html("SVE");
        $('#' + id).attr('disabled', false);
    }

    function update(id) {
        let status = $('#status-' + id).val();
        let married = $('#married-' + id).val();
        let paid = $('#pay-' + id).val();
        let dstring = {
            "id": id,
            "status": status,
            "married": married,
            "payment": paid
        }
        // console.log(dstring);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ url('tmadmin/userlist') }}",
            data: dstring,
            cache: false,
            datatype: "json",
            beforeSend: function() {
                $('#' + id).html('Saving <i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(data) {
                // console.log(data);
                if (data.msg == "success") {
                    $("#" + id).html("SVD");
                    $('#' + id).attr('disabled', true);
                } else {
                    $('#' + id).attr('disabled', false);
                    $("#" + id).html("SVE");
                }
            }

        });

    }
</script>
<script>
    function del(id) {
        // $(this).closest("tr").remove();
        let delbtn = $('#del-' + id);
        if (confirm("Are you really want to delete this Record...?")) {
            var input = {
                uid: id
            }
            // console.log(input);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/tmadmin/deleteuser') }}",
                data: input,
                cache: false,
                datatype: "json",
                beforeSend: function() {
                    delbtn.html('<i class="fas fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.status == "success") {
                        delbtn.closest("tr").remove();
                    } else {
                        delbtn.html('<i class="fas fa-spinner fa-spin"></i>');
                        alert("Could not delete record...");
                    }

                }
            });
        }
    }
</script>

@endsection