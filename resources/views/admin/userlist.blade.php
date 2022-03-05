@extends('layouts.admin')

@section('breadcrumb')
    <x-admin.breadcrumbs page="List of Users" />
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title text-primary"><b>List of Users </b></h3>
                <a href="{{ url('/tmadmin/register_user') }}" class="btn btn-primary btn-sm" style="float:right;">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Surame</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Mrg status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
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
                                        <button id="{{ $user->id }}" class="btn btn-primary btn-sm my-0"
                                            onclick="update({{ $user->id }})" type="button">Save</button>
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
    <script>
        $("#dataTable").DataTable();

        function enable_btn(id) {
            $("#" + id).html("Save");
            $('#' + id).attr('disabled', false);
        }

        function update(id) {
            let status = $('#status-' + id).val();
            let married = $('#married-' + id).val();
            let dstring = {
                "id": id,
                "status": status,
                "married": married
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
                    $('#'+id).html('Save <i class="fas fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    // console.log(data);
                    if (data.msg == "success") {
                        $("#" + id).html("Saved");
                        $('#' + id).attr('disabled', true);
                    } else {
                        $('#' + id).attr('disabled', false);
                        $("#" + id).html("Save");
                    }
                }

            });

        }
    </script>
@endsection
