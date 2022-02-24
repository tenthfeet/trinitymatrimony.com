@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                {{-- <h2 class="title">Contact Us</h2> --}}
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> View Profile
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->


    <div class="grid_3">
        <div class="container">

            <div class="profile row">
                <div class="col-md-9">
                    <div class="m-4">
                        <h2 class="mb-1">Profile Id : {{ $data->pid }}</h2>
                        <div class="row">
                            <div class="col-sm-6  text-center">
                                <img class="rounded" style="width:200px;height:200px;"
                                    src="{{ asset($data->photo) }}" />
                            </div>
                            <div class="col-sm-6">
                                <table class="table_working_hours">
                                    <tbody>
                                        <tr>
                                            <td width="40%">Name :</td>
                                            <td>{{ $data->firstname . ' ' . $data->surname }}</td>
                                        </tr>
                                        <tr>
                                            <td>Age :</td>

                                            <td>
                                                @php
                                                    if ($data->dob != '1970-01-01') {
                                                        echo age($data->dob);
                                                    }
                                                @endphp
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gender :</td>
                                            <td>{{ $data->gender }}</td>
                                        </tr>

                                        <tr>
                                            <td>Marital Status :</td>
                                            <td>{{ $data->maritalstatus }}</td>
                                        </tr>
                                        <tr>
                                            <td>Height :</td>
                                            <td>
                                                @php
                                                    if ($data->height != null) {
                                                        echo htmlspecialchars($data->height) . ' cm';
                                                    }
                                                @endphp
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if ($data->uid == Auth::User()->id)
                                    <ul class="breadcrumbs-custom-path">
                                        <li><a href="{{ url('/updateprofile') }}">Update profile</a></li>
                                    </ul>
                                @endif

                            </div>
                        </div>
                        <div class="my-4">
                            <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab"
                                        aria-controls="home" aria-selected="true">About Myself</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="career-tab" data-toggle="tab" href="#career" role="tab"
                                        aria-controls="profile" aria-selected="false">Qualification and career</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="family-tab" data-toggle="tab" href="#family" role="tab"
                                        aria-controls="contact" aria-selected="false">Family Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">Contact details</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="basic" role="tabpanel"
                                    aria-labelledby="basic-tab">
                                    <div class="tab_box">
                                        <h5>{{ $data->about }}</h5>
                                    </div>
                                    <div class="row">
                                        {{-- <h3>Education & Career</h3> --}}
                                        <div class="col-12 col-md-6">
                                            <table>
                                                <tbody>

                                                    <tr>
                                                        <td width="45%">House Name :</td>
                                                        <td class="day_value">{{ $data->housename }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="day_label">Mother Tongue:</td>
                                                        <td class="day_value">{{ $data->mothertongue }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="day_label">Other Language Known:</td>
                                                        <td class="day_value">{{ $data->otherlang }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="day_label">Height :</td>
                                                        <td class="day_value">
                                                            @php
                                                                if ($data->height != null) {
                                                                    echo htmlspecialchars($data->height) . ' cm';
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="day_label">Weight:</td>
                                                        <td class="day_value closed">
                                                            @php
                                                                if ($data->weight) {
                                                                    echo htmlspecialchars($data->weight) . ' Kg';
                                                                }
                                                                
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="day_label">DOB :</td>
                                                        <td class="day_value">
                                                            @php
                                                                if ($data->dob != '1970-01-01') {
                                                                    echo htmlspecialchars(date('d-m-Y', strtotime($data->dob)));
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <table>
                                                <tbody>
                                              
                                                    <tr>
                                                        <td width="45%">Date of Baptism :</td>
                                                        <td class="day_value">
                                                            @php
                                                                if ($data->dobap != '1970-01-01') {
                                                                    echo htmlspecialchars(date('d-m-Y', strtotime($data->dobap)));
                                                                }
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="day_label">Complexion :</td>
                                                        <td class="day_value">{{ $data->complex }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="day_label">Particular Church :</td>
                                                        <td class="day_value closed">{{ $data->particularchurch }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="day_label">Non Catholic Church :</td>
                                                        <td class="day_value closed">{{ $data->noncath_church }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="day_label">Blood Group :</td>
                                                        <td class="day_value closed">{{ $data->blood }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="tab_box">
                                        <h5>Partner preference</h5>
                                        <p>{{ $data->preference }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="career" role="tabpanel" aria-labelledby="career-tab">
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
                                <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
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
                                        <div class="table-responsive">
                                            <table id="sib_table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        {{-- <td width="25%">Name</td>
                                                        <td width="5%">Age</td>
                                                        <td width="20%">Job</td>
                                                        <td width="20%">Name of Brother in law / Sister in law
                                                        </td>
                                                        <td width="20%">House Name</td>
                                                        <td width="5%">Del</td> --}}
                                                        <td style="width: 200px;">Name</td>
                                                        <td width="5%">Age</td>
                                                        <td width="20%">Job</td>
                                                        <td width="20%">Name of Brother in law / Sister in law
                                                        </td>
                                                        <td width="20%">House Name</td>
                                                        {{-- <td jwidth="5%">Del</td> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                <div class="col-md-3">
                    <div class="newsletter">
                        <form method="post" action="{{ url('/profilesearch') }}">
                            @csrf
                            <input type="search" name="pid" size="30" required="" placeholder="Enter Profile ID :">
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
            </div>
        </div>
    </div>
@endsection

@section('script')
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
                        // data +=
                        //     '<td tstyle="padding:0px;"><input type="button" class="btn btn-danger btn-sm del" onClick="del(' +
                        //     x.id + ')" value="X"></td>';
                        data += '</tr>';
                    });
                    $('#sib_table tbody').html(data);
                }
            });

        }
    </script>
@endsection
