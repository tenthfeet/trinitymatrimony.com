@extends('layouts.app')

@section('content')
    <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">
                <ul>
                    <a href="{{ url('/viewprofile') }}"><i class="fa fa-home home_1"></i></a>
                    <span class="divider">&nbsp;|&nbsp;</span>
                    <li class="current-page">View Profile</li>
                </ul>
            </div>
            <div class="profile">
                <div class="col-md-8 profile_left">
                    <h2>Profile Id : {{ $data->pid }}</h2>
                    <div class="col_3">
                        <div class="col-sm-4  text-center">
                            <img class="rounded" style="width:200px;height:200px;"
                                src="{{ asset($data->photo) }}" />
                        </div>
                        <div class="col-sm-8 row_1">
                            <table class="table_working_hours">
                                <tbody>
                                    <tr class="closed">
                                        <td class="day_label">Name :</td>
                                        <td class="day_value closed">{{ $data->firstname . ' ' . $data->surname }}</td>
                                    </tr>
                                    <tr class="opened_1">
                                        <td class="day_label">Age :</td>

                                        <td class="day_value">
                                            @php
                                                if ($data->dob != '1970-01-01') {
                                                    echo age($data->dob);
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr class="opened">
                                        <td class="day_label">Gender :</td>
                                        <td class="day_value">{{ $data->gender }}</td>
                                    </tr>

                                    <tr class="opened">
                                        <td class="day_label">Marital Status :</td>
                                        <td class="day_value">{{ $data->maritalstatus }}</td>
                                    </tr>
                                    <tr class="opened">
                                        <td class="day_label">Height :</td>
                                        <td class="day_value">
                                            @php
                                                if ($data->height != null) {
                                                    echo htmlspecialchars($data->height) . ' cm';
                                                }
                                            @endphp
                                        </td>
                                    </tr>

                                    {{-- <tr class="closed">
                                        <td class="day_label">Education :</td>
                                        <td class="day_value closed"><span>Medicine</span></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            @if ($data->uid == Auth::User()->id)
                                <ul class="login_details">
                                    <li><a href="{{ url('/updateprofile') }}">Update profile</a></li>
                                </ul>
                            @endif

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="col_4">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
                                <li role="presentation" class="active"><a href="#basic" id="basic-tab" role="tab"
                                        data-toggle="tab" aria-controls="basic" aria-expanded="true">About Myself</a></li>
                                <li role="presentation"><a href="#career" role="tab" id="career-tab" data-toggle="tab"
                                        aria-controls="career">Qualification and career</a></li>
                                <li role="presentation"><a href="#family" role="tab" id="family-tab" data-toggle="tab"
                                        aria-controls="profile">Family Details</a></li>
                                <li role="presentation"><a href="#contact" role="tab" id="contact-tab" data-toggle="tab"
                                        aria-controls="profile1">Contact details</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="basic" aria-labelledby="basic-tab">
                                    <div class="tab_box">
                                        <h1>{{ $data->about }}</h1>
                                    </div>
                                    <div class="basic_1 basic_2">
                                        {{-- <h3>Education & Career</h3> --}}
                                        <div class="basic_1-left">
                                            <table class="table_working_hours">
                                                <tbody>

                                                    <tr class="opened">
                                                        <td class="day_label" >House Name :</td>
                                                        <td class="day_value">{{ $data->housename }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Mother Tongue:</td>
                                                        <td class="day_value">{{ $data->mothertongue }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Other Language Known:</td>
                                                        <td class="day_value">{{ $data->otherlang }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Height :</td>
                                                        <td class="day_value">
                                                            @php
                                                                if ($data->height != null) {
                                                                    echo htmlspecialchars($data->height) . ' cm';
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>

                                                    <tr class="closed">
                                                        <td class="day_label">Weight:</td>
                                                        <td class="day_value closed">
                                                            @php
                                                                if ($data->weight) {
                                                                    echo htmlspecialchars($data->weight) . ' Kg';
                                                                }
                                                                
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">DOB :</td>
                                                        <td class="day_value">
                                                            @php
                                                                if ($data->dob != '1970-01-01') {
                                                                    echo htmlspecialchars(date('d-m-Y', strtotime($data->dob)));
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Date of Baptism :</td>
                                                        <td class="day_value">
                                                            @php
                                                                if ($data->dobap != '1970-01-01') {
                                                                    echo htmlspecialchars(date('d-m-Y', strtotime($data->dobap)));
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Complexion :</td>
                                                        <td class="day_value">{{ $data->complex }}</td>
                                                    </tr>

                                                    <tr class="closed">
                                                        <td class="day_label">Particular Church :</td>
                                                        <td class="day_value closed">{{ $data->particularchurch }}</td>
                                                    </tr>
                                                    <tr class="closed">
                                                        <td class="day_label">Non Catholic Church :</td>
                                                        <td class="day_value closed">{{ $data->noncath_church }}</td>
                                                    </tr>
                                                    <tr class="closed">
                                                        <td class="day_label">Blood Group :</td>
                                                        <td class="day_value closed">{{ $data->blood }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h3>Partner preference</h3>
                                        <p>{{ $data->preference }}</p>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="career" aria-labelledby="career-tab1">
                                    <div class="basic_1 basic_2">
                                        <div class="basic_1-left">
                                            <table class="table_working_hours">
                                                <tbody>
                                                    <tr class="opened">
                                                        <td class="day_label">Educational Qualification :</td>
                                                        <td class="day_value">{{ $data->qualification }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Occupation :</td>
                                                        <td class="day_value">{{ $data->occupation }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Area / Field :</td>
                                                        <td class="day_value closed">{{ $data->area }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Annual income :</td>
                                                        <td class="day_value closed">{{ $data->income }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Address of the Firm / Company:</td>
                                                        <td class="day_value closed">
                                                            @php
                                                                $add = htmlspecialchars($data->firmaddress);
                                                                echo nl2br($add);
                                                            @endphp
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="family" aria-labelledby="family-tab">
                                    <div class="basic_1 basic_2">
                                        <div class="basic_1-left">
                                            <table class="table_working_hours">
                                                <tbody>
                                                    <tr class="opened">
                                                        <td class="day_label">Father's Name :</td>
                                                        <td class="day_value">{{ $data->fathername }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Father's Occupation :</td>
                                                        <td class="day_value">{{ $data->foccupation }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Father's House :</td>
                                                        <td class="day_value">{{ $data->fhouse }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Mother's Name :</td>
                                                        <td class="day_value">{{ $data->mothername }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Mother's Occupation :</td>
                                                        <td class="day_value">{{ $data->moccupation }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Mother's House :</td>
                                                        <td class="day_value">{{ $data->mhouse }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Siblings :</td>
                                                        <td class="day_value closed">{{ $data->siblings }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($data->siblings == 'Yes')
                                        <div class="tab_box">
                                            <h1>Sibling Details</h1>
                                        </div>
                                        <table id="sib_table" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <td width="25%">Name</td>
                                                    <td width="5%">Age</td>
                                                    <td width="20%">Job</td>
                                                    <td width="20%">Name of Brother in law / Sister in law
                                                    </td>
                                                    <td width="20%">House Name</td>
                                                    <td width="5%">Del</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="contact" aria-labelledby="contact-tab1">
                                    <div class="basic_1 basic_2">
                                        <div class="basic_1-left">
                                            <table class="table_working_hours">
                                                <h1>Sibling</h1>
                                                <tbody>
                                                    <tr class="opened">
                                                        <td class="day_label">Phone number 1 :</td>
                                                        <td class="day_value">{{ $data->mobile }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Phone number 2 :</td>
                                                        <td class="day_value">{{ $data->mobile2 }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Present parish :</td>
                                                        <td class="day_value closed">{{ $data->pparish }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label"> Parish from the year :</td>
                                                        <td class="day_value closed">{{ $data->pyear }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Former parish, Diocese :</td>
                                                        <td class="day_value">{{ $data->fparish }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">House type :</td>
                                                        <td class="day_value">{{ $data->housetype }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Address for Contact :</td>
                                                        <td class="day_value pb-2">
                                                            @php
                                                                $add = htmlspecialchars($data->caddress);
                                                                echo nl2br($add);
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Permanent Address :</td>
                                                        <td class="day_value closed">
                                                            @php
                                                                $add = htmlspecialchars($data->paddress);
                                                                echo nl2br($add);
                                                            @endphp
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 profile_right">
                    <div class="newsletter">
                        <form method="post" action="{{url('/profilesearch')}}">
                            @csrf
                            <input type="text" name="pid" size="30" required="" placeholder="Enter Profile ID :">
                            <input type="submit" value="Go">
                        </form>
                    </div>
                    <div class="view_profile">
                        <h3>View Similar Profiles</h3>




                    </div>
                    <div class="view_profile view_profile1">
                        <h3>Members who viewed this profile also viewed</h3>

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <script>
        siblingData();

        function siblingData() {
            let len = 0;
            var input = {
                id: {{ $data->uid }}
            }
            // console.log(input);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/sibling') }}",
                data: input,
                cache: false,
                datatype: "json",
                success: function(data) {
                    len = data.length;
                    // console.log(len);
                    if (len > 0) {
                        $('#sib_table').show();
                    } else {
                        $('#sib_table').hide();
                    }

                    data.forEach(x => {
                        // console.log(x.id);
                        let job = x.sibjob ? x.sibjob : '';
                        let partner = x.sibpartner ? x.sibpartner : '';
                        let house = x.sibhouse ? x.sibhouse : '';
                        data += '<tr>';
                        data += '<td>' + x.sibname + '</td>';
                        data += '<td>' + x.sibage + '</td>';
                        data += '<td>' + job + '</td>';
                        data += '<td>' + partner + '</td>';
                        data += '<td>' + house + '</td>';
                        data +=
                            '<td tstyle="padding:0px;"><input type="button" class="btn btn-danger btn-sm del" onClick="del(' +
                            x.id + ')" value="X"></td>';
                        data += '</tr>';
                    });
                    $('#sib_table tbody').html(data);
                }
            });

        }
    </script>
@endsection
