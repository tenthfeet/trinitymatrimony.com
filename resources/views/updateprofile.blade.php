@extends('layouts.app')

@section('content')

    <div class="grid_3">
        <div class="container">
            <div class="breadcrumb1">
                <ul>
                    <a href="{{url('/viewprofile')}}"><i class="fa fa-home home_1"></i></a>
                    <span class="divider">&nbsp;|&nbsp;</span>
                    <li class="current-page">Your Profile Details</li>
                </ul>
            </div>
            <div class="profile">
                <div class="col-md-8 profile_left">
                    @if (session()->has('msg'))
                        <div class="alert alert-info">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <h2>Your Profile Id : {{ $data->pid }}</h2>

                    <div class="col_4">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist" style="color:white">
                                <li role="presentation" class="active"><a href="#basic" id="basic-tab" role="tab"
                                        data-toggle="tab" aria-controls="home" aria-expanded="true">Basic Information</a>
                                </li>
                                <li role="presentation"><a href="#career" role="tab" id="career-tab" data-toggle="tab"
                                        aria-controls="career">Qualification and career</a></li>
                                <li role="presentation"><a href="#family" role="tab" id="family-tab" data-toggle="tab"
                                        aria-controls="family">About family</a></li>
                                <li role="presentation"><a href="#contact" role="tab" id="contact-tab" data-toggle="tab"
                                        aria-controls="contact">Contact details</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="basic" aria-labelledby="basic-tab">
                                    <div class="basic_1">
                                        <h3>Basics </h3>
                                        <div class="col-sm-12 login_left">
                                            <form action="{{ url('/updateprofile') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>House Name *</label>
                                                        <input type="text" id="housename" name="housename"
                                                            value="{{ $errors->has('housename') ? old('housename') : $data->housename }}"
                                                            class="form-text @error('housename') border-red @enderror">
                                                        @error('housename')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Gender *</label>
                                                        <div class="select-block1 ">
                                                            @php
                                                                $v = $errors->has('gender') ? old('gender') : $data->gender;
                                                                $c = $errors->has('gender') ? 'border-red' : '';
                                                                echo arrayToSelectOption(Arrays::$gender, 'gender', $c, '', $v, 'Gender');
                                                            @endphp
                                                        </div>
                                                        @error('gender')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Date of Birth *</label>
                                                        <input type="date" id="dob" name="dob"
                                                            value="{{ $data->dob == '1970-01-01' ? '' : date('Y-m-d', strtotime($data->dob)) }}"
                                                            class="form-text @error('dob') border-red @enderror">
                                                        @error('dob')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Date of Baptism</label>
                                                        <input type="date" id="dobap" name="dobap"
                                                            value="{{ $data->dobap == '1970-01-01' ? '' : date('Y-m-d', strtotime($data->dobap)) }}"
                                                            size="60" maxlength="60"
                                                            class="form-text @error('dobap') border-red @enderror">
                                                        @error('dobap')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Mother Tongue *</label>
                                                        <div class="select-block1">
                                                            @php
                                                                $v = $errors->has('mothertongue') ? old('mothertongue') : $data->mothertongue;
                                                                $c = $errors->has('mothertongue') ? 'border-red' : '';
                                                                echo arrayToSelectOption(Arrays::$lang, 'mothertongue', $c, '', $v, 'Language');
                                                            @endphp

                                                        </div>
                                                        @error('mothertongue')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Other Language Known</label>
                                                        <input type="text" id="otherlang" name="otherlang"
                                                            value="{{ $errors->has('otherlang') ? old('otherlang') : $data->otherlang }}"
                                                            size="60" maxlength="60"
                                                            class="form-text @error('otherlang') border-red @enderror">
                                                        @error('otherlang')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Particular Church</label>
                                                        <div class="select-block1 ">
                                                            @php
                                                                $v = $errors->has('particularchurch') ? old('particularchurch') : $data->particularchurch;
                                                                $c = $errors->has('particularchurch') ? 'border-red' : '';
                                                                echo arrayToSelectOption(Arrays::$church, 'particularchurch', $c, '', $v, 'Church');
                                                            @endphp
                                                        </div>
                                                        @error('particularchurch')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Non Catholic Church</label>
                                                        <input type="text" id="noncath_church" name="noncath_church"
                                                            value="{{ $errors->has('noncath_church') ? old('noncath_church') : $data->noncath_church }}"
                                                            class="form-text @error('noncath_church') border-red @enderror">
                                                        @error('noncath_church')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Height (cm) *</label>
                                                        <input type="text" id="height" name="height"
                                                            value="{{ $errors->has('height') ? old('height') : $data->height }}"
                                                            class="form-text @error('height') border-red @enderror">
                                                        @error('height')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Weight (Kg) *</label>
                                                        <input type="text" id="weight" name="weight"
                                                            value="{{ $errors->has('weight') ? old('weight') : $data->weight }}"
                                                            class="form-text @error('weight') border-red @enderror">
                                                        @error('weight')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Blood Group *</label>
                                                        <input type="text" id="blood" name="blood"
                                                            value="{{ $errors->has('blood') ? old('blood') : $data->blood }}"
                                                            class="form-text @error('blood') border-red @enderror">
                                                        @error('blood')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Complexion</label>
                                                        <input type="text" id="complex" name="complex"
                                                            value="{{ $errors->has('complex') ? old('complex') : $data->complex }}"
                                                            class="form-text @error('complex') border-red @enderror">
                                                        @error('complex')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Marital Status *</label>
                                                        <div class="select-block1">
                                                            @php
                                                                $v = $errors->has('maritalstatus') ? old('maritalstatus') : $data->maritalstatus;
                                                                $c = $errors->has('maritalstatus') ? 'border-red' : '';
                                                                echo arrayToSelectOption(Arrays::$marital, 'maritalstatus', $c, '', $v, 'Status');
                                                            @endphp
                                                        </div>
                                                        @error('maritalstatus')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Upload Photo<span class="form-required"
                                                                title="This field is required.">*</span></label>
                                                        <input type="file" id="photo" name="photo"
                                                            class="form-text @error('photo') border-red @enderror">
                                                    </div>
                                                    @error('photo')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Describe about yourself in few words*</label>
                                                        <textarea name="about" id="about" cols="30"
                                                            class="form-text @error('about') border-red @enderror"
                                                            style="height: 100px;">{{ $errors->has('about') ? old('about') : $data->about }}</textarea>
                                                        @error('about')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Partner preference any *</label>
                                                        <textarea name="preference" id="preference" cols="30"
                                                            class="form-text @error('preference') border-red @enderror"
                                                            style="height: 100px;">{{ $errors->has('preference') ? old('preference') : $data->preference }}</textarea>
                                                        @error('preference')
                                                            <div class="text-red">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <input type="hidden" name="pid" value="{{ $data->pid }}">

                                                <div class="form-actions">
                                                    <input type="submit" id="edit-submit" value="SAVE"
                                                        class="btn_1 submit">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="career" aria-labelledby="career-tab">
                                    <div class="basic_3">
                                        <h4>Qualification and Career</h4>
                                        <div class="basic_1 basic_2">
                                            <form id="career-frm">
                                                <div class="col-md-12 basic_1-left">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Educational Qualification</label>
                                                            <div class="select-block1">
                                                                @php
                                                                    $v = $errors->has('qualification') ? old('qualification') : $data->qualification;
                                                                    echo arrayToSelectOption(Arrays::$qualification, 'qualification', '', 'required', $v, 'Qualification');
                                                                @endphp
                                                            </div>
                                                            <div id="er-qualification" class="text-red"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Occupation</label>
                                                            <input type="text" id="occupation" name="occupation"
                                                                value="{{ $data->occupation }}"
                                                                class="form-text required">
                                                            <div id="er-occupation" class="text-red"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Area / Field</label>
                                                            <input type="text" id="area" name="area"
                                                                value="{{ $data->area }}" size="60" maxlength="150"
                                                                class="form-text">
                                                            <div id="er-area" class="text-red"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Annual income</label>
                                                            <input type="number" id="income" name="income"
                                                                value="{{ $data->income }}" class="form-text">
                                                            <div id="er-income" class="text-red"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Address of the Firm / Company / Self business</label>
                                                            <textarea name="firmaddress" id="firmaddress" cols="30"
                                                                class="form-text"
                                                                style="height: 100px;">{{ $data->firmaddress }}</textarea>
                                                            <div id="er-firmaddress" class="text-red"></div>
                                                        </div>

                                                    </div>

                                                    <div id='career-response'></div>

                                                    <div class="form-actions">
                                                        <input type="button" value="SAVE" class="btn_1 submit"
                                                            onclick="updatecareer()">
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="family" aria-labelledby="family-tab">
                                    <div class="basic_1 basic_2">
                                        <form id="family-frm">
                                            <div class="basic_1-left">
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label>Father's Name</label>
                                                        <input type="text" id="fathername" name="fathername"
                                                            value="{{ $data->fathername }}" size="60" maxlength="150"
                                                            class="form-text">
                                                        <div id="error-fathername" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>House Name</label>
                                                        <input type="text" id="fhouse" name="fhouse"
                                                            value="{{ $data->fhouse }}" size="60" maxlength="150"
                                                            class="form-text">
                                                        <div id="error-fhouse" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>Father's Occupation</label>
                                                        <input type="text" id="foccupation" name="foccupation"
                                                            value="{{ $data->foccupation }}" size="60" maxlength="150"
                                                            class="form-text">
                                                        <div id="error-foccupation" class="text-red"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label>Mother's Name</label>
                                                        <input type="text" id="mothername" name="mothername"
                                                            value="{{ $data->mothername }}" size="60" maxlength="150"
                                                            class="form-text">
                                                        <div id="error-mothername" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>House Name</label>
                                                        <input type="text" id="mhouse" name="mhouse"
                                                            value="{{ $data->mhouse }}" size="60" maxlength="150"
                                                            class="form-text">
                                                        <div id="error-mhouse" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>Mother's Occupation</label>
                                                        <input type="text" id="moccupation" name="moccupation"
                                                            value="{{ $data->moccupation }}" size="60" maxlength="150"
                                                            class="form-text">
                                                        <div id="error-moccupation" class="text-red"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label>Do you have Siblings?</label>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <div class="select-block1">
                                                            @php
                                                                $v = $data->siblings != '' ? $data->siblings : '';
                                                                echo arrayToSelectOption(Arrays::$ny, 'siblings', '', '', $v);
                                                            @endphp

                                                        </div>
                                                        <div id="error-siblings" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        {{-- <input type="button"  value="+"
                                                            class="btn_1 submit" style="margin-top: 0px;"> --}}
                                                        <button type="button" id="addsibling" class="btn_1 submit"
                                                            data-toggle="modal" data-target="#sib" style="margin-top: 0px;">
                                                            Add Siblings
                                                        </button>
                                                    </div>

                                                    <table id="sib_table" class="table table-bordered table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <td width="25%">Name</td>
                                                                <td width="5%">Age</td>
                                                                <td width="20%">Job</td>
                                                                <td width="20%">Name of Brother in law / Sister in law</td>
                                                                <td width="20%">House Name</td>
                                                                <td width="5%">Del</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div id='family-response'></div>

                                                <div class="form-actions">
                                                    <input type="button" value="SAVE" class="btn_1 submit"
                                                        onclick="updatefamily()">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="contact" aria-labelledby="contact-tab">
                                    <div class="basic_1 basic_2">
                                        <form id="contact-frm">
                                            <div class="basic_1-left">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Present parish</label>
                                                        <input type="text" id="pparish" name="pparish"
                                                            value="{{ $data->pparish }}" maxlength="150"
                                                            class="form-text">
                                                        <div id="error-pparish" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>From Which year</label>
                                                        <input type="text" id="pyear" name="pyear"
                                                            value="{{ $data->pyear }}" size="60" maxlength="60"
                                                            class="form-text">
                                                        <div id="error-pyear" class="text-red"></div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Former parish, Diocese</label>
                                                        <input type="text" id="fparish" name="fparish"
                                                            value="{{ $data->fparish }}" size="60" maxlength="60"
                                                            class="form-text">
                                                        <div id="error-fparish" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>House</label>
                                                        <div class="select-block1">
                                                            @php
                                                                $v = $data->housetype != '' ? $data->housetype : '';
                                                                echo arrayToSelectOption(Arrays::$housetype, 'housetype', '', '', $v);
                                                            @endphp
                                                        </div>
                                                        <div id="error-housetype" class="text-red"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Address for Contact</label>
                                                        <textarea name="caddress" id="caddress" cols="30"
                                                            class="form-text"
                                                            style="height: 100px;">{{ $data->caddress }}</textarea>
                                                        <div id="error-caddress" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Permanent Address</label>
                                                        <textarea name="paddress" id="paddress" cols="30"
                                                            class="form-text"
                                                            style="height: 100px;">{{ $data->paddress }}</textarea>
                                                        <div id="error-paddress" class="text-red"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Phone number 1</label>
                                                        <input type="number" id="mobile1" name="mobile1"
                                                            value="{{ Auth::user()->mobile }}" maxlength="10"
                                                            class="form-text" disabled>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Phone number 2</label>
                                                        <input type="number" id="mobile2" name="mobile2"
                                                            value="{{ $data->mobile2 }}" maxlength="10"
                                                            class="form-text">
                                                        <div id="error-mobile2" class="text-red"></div>
                                                    </div>
                                                </div>

                                                <div id='contact-response'></div>

                                                <div class="form-actions">
                                                    <input type="button" value="SAVE" class="btn_1 submit"
                                                        onclick="updateContact()">
                                                </div>
                                            </div>
                                        </form>

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

    {{-- Modal --}}
    <div class="modal fade " id="sib" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <label>Add Sibling details</label>
                    {{-- <h5 class="modal-title" id="staticBackdropLabel" style="width:80%">Add Sibling details</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sib-frm">
                        <div class="form-group">
                            Name
                            <input id="SiblingName" class="form-control" type="text" name="SiblingName">
                            <div id="error-SiblingName" class="text-red">
                            </div>
                        </div>
                        <div class="form-group">
                            Age
                            <input id="SiblingAge" class="form-control" type="number" name="SiblingAge">
                            <div id="error-SiblingAge" class="text-red">
                            </div>
                        </div>
                        <div class="form-group">
                            Job
                            <input id="sibjob" class="form-control" type="text" name="sibjob">
                        </div>
                        <div class="form-group">
                            Name of Brother in law / Sister in law
                            <input id="sibpartner" class="form-control" type="text" name="sibpartner">
                        </div>
                        <div class="form-group">
                            House Name
                            <input id="sibhouse" class="form-control" type="text" name="sibhouse">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" onclick="addsib()" class="btn btn-primary">Add</button>
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal --}}

    <script>

        function del(id) {
            if (confirm("Are you really want to delete this row...?")) {
                // $(this).closest("tr").remove();
                var input = {
                    sid: id
                }
                // console.log(input);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ url('/deletesibling') }}",
                    data: input,
                    cache: false,
                    datatype: "json",
                    success: function(data) {
                        if (data.status == "success") {
                            siblingData();
                        } else {
                            alert("Could not delete record...");
                        }

                    }
                });
            }
        }

       
    </script>
    <script>
        let fields = ["qualification", "occupation", "area", "income", "firmaddress"];

        function updatecareer() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/updatecareer') }}",
                data: $('#career-frm').serialize(),
                cache: false,
                datatype: "json",
                success: function(data) {
                    // console.log(data);
                    fields.forEach(item => {
                        $('#er-' + item).html('');
                        $('#' + item).removeClass('border-red');

                    });
                    if (data.status == 'success') {
                        $('#career-response').removeClass();
                        $('#career-response').addClass('alert alert-' + data.status);
                        $('#career-response').html(data.msg);
                    } else {
                        $('#career-response').hide();
                    }

                },
                error: function(data) {
                    $('#career-response').removeClass();
                    $('#career-response').html('');

                    if (data.status === 422) {
                        var response = $.parseJSON(data.responseText);
                        // var response = data.responseText;
                        var errors = response.errors;
                        // console.log(errors);
                        // console.log(errors.area[0]);
                        // console.log(response.errors.area[0]);
                        fields.forEach(item => {
                            if (errors.hasOwnProperty(item)) {
                                value = errors[item][0];
                                $('#er-' + item).html(value);
                                $('#' + item).addClass('border-red');
                            } else {
                                $('#er-' + item).html('');
                                $('#' + item).removeClass('border-red');

                            }
                        });

                    }
                }

            });

        }

        function updatefamily() {

            let family_inputs = ["fathername", "fhouse", "foccupation", "mothername", "mhouse", "moccupation", "siblings"];
            // console.log($('#family-frm').serialize());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/updatefamily') }}",
                data: $('#family-frm').serialize(),
                cache: false,
                datatype: "json",
                success: function(data) {
                    // console.log(data);
                    family_inputs.forEach(item => {
                        $('#error-' + item).html('');
                        $('#' + item).removeClass('border-red');

                    });
                    if (data.status == 'success') {
                        $('#family-response').removeClass();
                        $('#family-response').addClass('alert alert-' + data.status);
                        $('#family-response').html(data.msg);
                    } else {
                        $('#family-response').hide();
                    }

                },
                error: function(data) {
                    $('#family-response').removeClass();
                    $('#family-response').html('');

                    if (data.status === 422) {
                        var response = $.parseJSON(data.responseText);
                        var errors = response.errors;
                        family_inputs.forEach(item => {
                            if (errors.hasOwnProperty(item)) {
                                value = errors[item][0];
                                $('#error-' + item).html(value);
                                $('#' + item).addClass('border-red');
                            } else {
                                $('#error-' + item).html('');
                                $('#' + item).removeClass('border-red');

                            }
                        });

                    }
                }

            });

        }

        function updateContact() {

            let contact_inputs = ["pparish", "pyear", "fparish", "housetype", "caddress", "paddress", "mobile2"];

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/updatecontact') }}",
                data: $('#contact-frm').serialize(),
                cache: false,
                datatype: "json",
                success: function(data) {
                    // console.log(data);
                    contact_inputs.forEach(item => {
                        $('#error-' + item).html('');
                        $('#' + item).removeClass('border-red');

                    });
                    if (data.status == 'success') {
                        $('#contact-response').removeClass();
                        $('#contact-response').addClass('alert alert-' + data.status);
                        $('#contact-response').html(data.msg);
                    } else {
                        $('#contact-response').hide();
                    }

                },
                error: function(data) {
                    $('#contact-response').removeClass();
                    $('#contact-response').html('');

                    if (data.status === 422) {
                        var response = $.parseJSON(data.responseText);
                        var errors = response.errors;
                        contact_inputs.forEach(item => {
                            if (errors.hasOwnProperty(item)) {
                                value = errors[item][0];
                                $('#error-' + item).html(value);
                                $('#' + item).addClass('border-red');
                            } else {
                                $('#error-' + item).html('');
                                $('#' + item).removeClass('border-red');

                            }
                        });

                    }
                }

            });

        }

        function addsib() {

            let sib_inputs = ["SiblingName", "SiblingAge"];

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/addsibling') }}",
                data: $('#sib-frm').serialize(),
                cache: false,
                datatype: "json",
                success: function(data) {

                    if (data.status == 'success') {
                        $('#sib').modal('hide');

                        // console.log(data);
                        sib_inputs.forEach(item => {
                            $('#error-' + item).html('');
                            $('#' + item).removeClass('border-red');
                        });
                        siblingData();
                        
                        $('#sib-frm')[0].reset();

                    } else {
                        alert("Could not insert record...!");
                    }

                },
                error: function(data) {
                    $('#contact-response').removeClass();
                    $('#contact-response').html('');
                    // console.log($('#sib-frm').serialize());
                    if (data.status === 422) {
                        var response = $.parseJSON(data.responseText);
                        var errors = response.errors;
                        sib_inputs.forEach(item => {
                            if (errors.hasOwnProperty(item)) {
                                value = errors[item][0];
                                $('#error-' + item).html(value);
                                $('#' + item).addClass('border-red');
                            } else {
                                $('#error-' + item).html('');
                                $('#' + item).removeClass('border-red');

                            }
                        });

                    }
                }

            });

        }


        function siblingData() {
            let len = 0;
            var input = {
                id: {{ Auth::user()->id }}
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

        function sib() {
            if ($('#siblings').val() == 'Yes') {
                $('#addsibling').show();
                // $('#sib_table').show();
                siblingData();
            } else {
                $('#addsibling').hide();
                $('#sib_table').hide();
            }
        }
        sib();
        $('#siblings').change(function() {
            sib();
        });

    </script>

@endsection
