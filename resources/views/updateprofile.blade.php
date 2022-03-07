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

    <div class="grid_3 py-5">
        <div class="container">
            <div class="profile row py-lg-5">
                <div class="col-md-9">
                    <div class="m-4">
                        @if (session()->has('msg'))
                            <div class="alert alert-info">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <div class="ctr">
                            <h2 class="mb-1 text-theme">Your Profile Id : {{ $data->pid }}</h2>
                        </div>
                        <div class="my-4">
                            <ul id="pro" class="nav nav-tabs mb-2" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab"
                                        aria-controls="home" aria-selected="true">Basic Information</a>
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
                                <div class="tab-pane fade show active my-4" id="basic" role="tabpanel"
                                    aria-labelledby="basic-tab">
                                    <div class="col-sm-12 login_left">
                                        <form action="{{ url('/updateprofile') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>House Name *</label>
                                                    <input type="text" id="housename" name="housename"
                                                        value="{{ $errors->has('housename') ? old('housename') : $data->housename }}"
                                                        class="form-control @error('housename') border-red @enderror">
                                                    @error('housename')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Gender *</label>

                                                    @php
                                                        $v = Auth::user()->gender;
                                                        $c = $errors->has('gender') ? 'custom-select border-red' : 'custom-select';
                                                        echo selectOptionFromArray(Arrays::$gender, '', $c, 'disabled', $v, 'Gender');
                                                    @endphp

                                                    <input type="hidden" name="gender" value="{{ Auth::user()->gender }}">

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
                                                        class="form-control @error('dob') border-red @enderror">
                                                    @error('dob')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Date of Baptism</label>
                                                    <input type="date" id="dobap" name="dobap"
                                                        value="{{ $data->dobap == '1970-01-01' ? '' : date('Y-m-d', strtotime($data->dobap)) }}"
                                                        size="60" maxlength="60"
                                                        class="form-control @error('dobap') border-red @enderror">
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
                                                            $c = $errors->has('mothertongue') ? 'custom-select border-red' : 'custom-select';
                                                            echo selectOptionFromArray(Arrays::$lang, 'mothertongue', $c, '', $v, 'Language');
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
                                                        class="form-control @error('otherlang') border-red @enderror">
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
                                                            $c = $errors->has('particularchurch') ? 'custom-select border-red' : 'custom-select';
                                                            echo selectOptionFromArray(Arrays::$church, 'particularchurch', $c, '', $v, 'Church');
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
                                                        class="form-control @error('noncath_church') border-red @enderror">
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
                                                        class="form-control @error('height') border-red @enderror">
                                                    @error('height')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Weight (Kg) *</label>
                                                    <input type="text" id="weight" name="weight"
                                                        value="{{ $errors->has('weight') ? old('weight') : $data->weight }}"
                                                        class="form-control @error('weight') border-red @enderror">
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
                                                        class="form-control @error('blood') border-red @enderror">
                                                    @error('blood')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Complexion</label>
                                                    <input type="text" id="complex" name="complex"
                                                        value="{{ $errors->has('complex') ? old('complex') : $data->complex }}"
                                                        class="form-control @error('complex') border-red @enderror">
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
                                                            $c = $errors->has('maritalstatus') ? 'custom-select border-red' : 'custom-select';
                                                            echo selectOptionFromArray(Arrays::$marital, 'maritalstatus', $c, '', $v, 'Status');
                                                        @endphp
                                                    </div>
                                                    @error('maritalstatus')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-3 d-flex justify-content-center">
                                                            @if ($data->photo != null)
                                                                <a class="my-auto" href="#" data-toggle="modal"
                                                                    data-target="#profilephoto">
                                                                    <img src="{{ asset($data->photo) }}"
                                                                        style="height: 50px;width:50px;">
                                                                </a>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="profilephoto" tabindex="-1"
                                                                    aria-labelledby="profilephoto" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <div class="text-center">
                                                                                    <img id="pm" src="{{ str_replace('\\', '/', asset($data->photo)) }}"
                                                                                        style="max-height: 70vh;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-10 col-9">

                                                            <label>Upload Photo<span class="form-required"
                                                                    title="This field is required.">*</span></label>
                                                            <input type="file"
                                                                class="form-control-file @error('photo') border-red @enderror"
                                                                id="photo" name="photo">
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('photo')
                                                    <div class="text-red">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Describe about yourself in few words*</label>
                                                    <textarea name="about" id="about" cols="30"
                                                        class="form-control @error('about') border-red @enderror"
                                                        style="height: 100px;">{{ $errors->has('about') ? old('about') : $data->about }}</textarea>
                                                    @error('about')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Partner preference any *</label>
                                                    <textarea name="preference" id="preference" cols="30"
                                                        class="form-control @error('preference') border-red @enderror"
                                                        style="height: 100px;">{{ $errors->has('preference') ? old('preference') : $data->preference }}</textarea>
                                                    @error('preference')
                                                        <div class="text-red">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <input type="hidden" name="pid" value="{{ $data->pid }}">

                                            <div class="form-actions">
                                                <input type="submit" id="edit-submit" value="SAVE" class="btn btn-warning">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <div class="tab-pane fade my-4" id="career" role="tabpanel" aria-labelledby="career-tab">
                                    <div class="basic_3">
                                        {{-- <h4>Qualification and Career</h4> --}}
                                        <div class="basic_1 basic_2">
                                            <form id="career-frm">
                                                <div class="col-md-12 basic_1-left">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Educational Qualification</label>
                                                            <div class="select-block1">
                                                                @php
                                                                    $v = $errors->has('qualification') ? old('qualification') : $data->qualification;
                                                                    echo selectOptionFromArray(Arrays::$qualification, 'qualification', 'custom-select', 'required', $v, 'Qualification');
                                                                @endphp
                                                            </div>
                                                            <div id="er-qualification" class="text-red"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Occupation</label>
                                                            <input type="text" id="occupation" name="occupation"
                                                                value="{{ $data->occupation }}"
                                                                class="form-control required">
                                                            <div id="er-occupation" class="text-red"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Area / Field</label>
                                                            <input type="text" id="area" name="area"
                                                                value="{{ $data->area }}" size="60" maxlength="150"
                                                                class="form-control">
                                                            <div id="er-area" class="text-red"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Annual income</label>
                                                            <input type="number" id="income" name="income"
                                                                value="{{ $data->income }}" class="form-control">
                                                            <div id="er-income" class="text-red"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Address of the Firm / Company / Self business</label>
                                                            <textarea name="firmaddress" id="firmaddress" cols="30"
                                                                class="form-control"
                                                                style="height: 100px;">{{ $data->firmaddress }}</textarea>
                                                            <div id="er-firmaddress" class="text-red"></div>
                                                        </div>

                                                    </div>

                                                    <div id='career-response'></div>

                                                    <div class="form-actions">
                                                        <button id="upcareer" type="button" class="btn btn-warning"
                                                            onclick="updatecareer()">Save</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade my-4" id="family" role="tabpanel" aria-labelledby="family-tab">
                                    <div class="basic_1 basic_2">
                                        <form id="family-frm">
                                            <div class="basic_1-left">
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label>Father's Name</label>
                                                        <input type="text" id="fathername" name="fathername"
                                                            value="{{ $data->fathername }}" size="60" maxlength="150"
                                                            class="form-control">
                                                        <div id="error-fathername" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>House Name</label>
                                                        <input type="text" id="fhouse" name="fhouse"
                                                            value="{{ $data->fhouse }}" size="60" maxlength="150"
                                                            class="form-control">
                                                        <div id="error-fhouse" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>Father's Occupation</label>
                                                        <input type="text" id="foccupation" name="foccupation"
                                                            value="{{ $data->foccupation }}" size="60" maxlength="150"
                                                            class="form-control">
                                                        <div id="error-foccupation" class="text-red"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label>Mother's Name</label>
                                                        <input type="text" id="mothername" name="mothername"
                                                            value="{{ $data->mothername }}" size="60" maxlength="150"
                                                            class="form-control">
                                                        <div id="error-mothername" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>House Name</label>
                                                        <input type="text" id="mhouse" name="mhouse"
                                                            value="{{ $data->mhouse }}" size="60" maxlength="150"
                                                            class="form-control">
                                                        <div id="error-mhouse" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>Mother's Occupation</label>
                                                        <input type="text" id="moccupation" name="moccupation"
                                                            value="{{ $data->moccupation }}" size="60" maxlength="150"
                                                            class="form-control">
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
                                                                echo selectOptionFromArray(Arrays::$ny, 'siblings', 'custom-select', '', $v);
                                                            @endphp

                                                        </div>
                                                        <div id="error-siblings" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-4">

                                                        <button type="button" id="addsibling" class="btn btn-warning"
                                                            data-toggle="modal" data-target="#sib" style="margin-top: 0px;">
                                                            Add Siblings
                                                        </button>
                                                    </div>

                                                    <table id="sib_table" class="table table-bordered table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th width="25%">Name</th>
                                                                <th width="5%">Age</th>
                                                                <th width="20%">Job</th>
                                                                <th width="20%">Name of Brother in law / Sister in law</th>
                                                                <th width="20%">House Name</th>
                                                                <th width="5%">Del</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div id='family-response'></div>

                                                <div class="form-actions">
                                                    <button id="upfamily" type="button" class="btn btn-warning"
                                                        onclick="updatefamily()">Save</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="tab-pane fade my-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="basic_1 basic_2">
                                        <form id="contact-frm">
                                            <div class="basic_1-left">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Present parish</label>
                                                        <input type="text" id="pparish" name="pparish"
                                                            value="{{ $data->pparish }}" maxlength="150"
                                                            class="form-control">
                                                        <div id="error-pparish" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>From Which year</label>
                                                        <input type="text" id="pyear" name="pyear"
                                                            value="{{ $data->pyear }}" size="60" maxlength="60"
                                                            class="form-control">
                                                        <div id="error-pyear" class="text-red"></div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Former parish, Diocese</label>
                                                        <input type="text" id="fparish" name="fparish"
                                                            value="{{ $data->fparish }}" size="60" maxlength="60"
                                                            class="form-control">
                                                        <div id="error-fparish" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>House</label>
                                                        <div class="select-block1">
                                                            @php
                                                                $v = $data->housetype != '' ? $data->housetype : '';
                                                                echo selectOptionFromArray(Arrays::$housetype, 'housetype', 'custom-select', '', $v);
                                                            @endphp
                                                        </div>
                                                        <div id="error-housetype" class="text-red"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>State</label>
                                                        <div class="select-block1">
                                                            @php
                                                                $v = $data->state ? $data->state : '';
                                                                echo selectOptionFromArray(Arrays::$states, 'state', 'custom-select', '', $v, 'State');
                                                            @endphp
                                                        </div>
                                                        <div id="error-state" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>District</label>
                                                        <select id="district" class="custom-select" name="district"
                                                            id="district">
                                                            @php
                                                                if ($data->district) {
                                                                    echo optionsFromArray(Arrays::$district, $data->state, $data->district, 'District');
                                                                } else {
                                                                    echo '<option value="">--Select District--</option>';
                                                                }
                                                            @endphp
                                                        </select>

                                                        <div id="error-district" class="text-red"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Address for Contact</label>
                                                        <textarea name="caddress" id="caddress" cols="30"
                                                            class="form-control"
                                                            style="height: 100px;">{{ $data->caddress }}</textarea>
                                                        <div id="error-caddress" class="text-red"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Permanent Address</label>
                                                        <textarea name="paddress" id="paddress" cols="30"
                                                            class="form-control"
                                                            style="height: 100px;">{{ $data->paddress }}</textarea>
                                                        <div id="error-paddress" class="text-red"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Phone number 1</label>
                                                        <input type="number" id="mobile1" name="mobile1"
                                                            value="{{ Auth::user()->mobile }}" maxlength="10"
                                                            class="form-control" disabled>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Phone number 2</label>
                                                        <input type="number" id="mobile2" name="mobile2"
                                                            value="{{ $data->mobile2 }}" maxlength="10"
                                                            class="form-control">
                                                        <div id="error-mobile2" class="text-red"></div>
                                                    </div>
                                                </div>

                                                <div id='contact-response'></div>

                                                <div class="form-actions">
                                                    <button id="updatecontact" type="button" class="btn btn-warning"
                                                        onclick="updateContact()">SAVE</button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3 class="my-4 text-theme">Search Profile by Id</h3>
                    <div class="newsletter">
                        <form method="post" action="{{ url('/profilesearch') }}">
                            @csrf
                            <div class="form-group">
                                <input type="search" class="form-control" name="pid" size="30" required=""
                                    placeholder="Enter Profile ID :">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Go">
                            </div>


                        </form>
                    </div>

                    {{-- <div class="view_profile view_profile1">
                        <h4 class="text-theme">Recent Profiles</h4>

                    </div> --}}
                </div>
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
                            <button id="mbtn" type="button" onclick="addsib()" class="btn btn-secondary">Add</button>
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal --}}
@endsection

@section('script')
    <script>
        function del(id) {
            if (confirm("Are you really want to delete this Record...?")) {
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

        $('#state').change(function() {
            let state = $('#state').val();
            if (state == '') {
                let state = $('#district').html('<option value="">--Select District--</option>');
            } else {
                var input = {
                    st: state
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ url('/district') }}",
                    data: input,
                    cache: false,
                    datatype: "json",
                    success: function(data) {
                        $('#district').html(data);
                        // if (data.status == "success") {
                        //     siblingData();
                        // } else {
                        //     alert("Could not delete record...");
                        // }

                    }
                });
            }
        })
    </script>
    <script>
        function updatecareer() {
            let fields = ["qualification", "occupation", "area", "income", "firmaddress"];
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
                beforeSend: function() {
                    $('#upcareer').html('Save <i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    $('#upcareer').html('Save');
                    // console.log(data);
                    fields.forEach(item => {
                        $('#er-' + item).html('');
                        $('#' + item).removeClass('border-red');

                    });
                    if(data.status == 'success'){
                        $('.nav-tabs a[href="#family"]').tab('show');
                    }
                    if (data.status == 'success' || data.status == 'danger') {
                        $('#career-response').removeClass();
                        $('#career-response').addClass('alert alert-' + data.status);
                        $('#career-response').html(data.msg);
                        $('#career-response').show();
                    } else {
                        $('#career-response').hide();
                    }

                },
                error: function(data) {
                    $('#upcareer').html('Save');
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
                beforeSend: function() {
                    $('#upfamily').html('Save <i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    $('#upfamily').html('Save');
                    // console.log(data);
                    family_inputs.forEach(item => {
                        $('#error-' + item).html('');
                        $('#' + item).removeClass('border-red');

                    });
                    if(data.status == 'success'){
                        $('.nav-tabs a[href="#contact"]').tab('show');
                    }
                    if (data.status == 'success' || data.status == 'danger') {
                        $('#family-response').removeClass();
                        $('#family-response').addClass('alert alert-' + data.status);
                        $('#family-response').html(data.msg);
                    } else {
                        $('#family-response').hide();
                    }

                },
                error: function(data) {
                    $('#upfamily').html('Save');
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

            let contact_inputs = ["pparish", "pyear", "fparish", "housetype", "state", "district", "caddress", "paddress",
                "mobile2"
            ];

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
                beforeSend: function() {
                    $('#updatecontact').html('Save <i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    $('#updatecontact').html('Save');
                    // console.log(typeof(data));
                    contact_inputs.forEach(item => {
                        $('#error-' + item).html('');
                        $('#' + item).removeClass('border-red');

                    });
                    if(data.status == 'success'){
                        $('.nav-tabs a[href="#basic"]').tab('show');
                    }
                    if (data.status == 'success' || data.status == 'danger') {
                        $('#contact-response').removeClass();
                        $('#contact-response').addClass('alert alert-' + data.status);
                        $('#contact-response').html(data.msg);
                        $('#contact-response').show();
                    } else {
                        $('#contact-response').hide();
                    }

                },
                error: function(data) {
                    $('#updatecontact').html('Save');
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
                beforeSend: function() {
                    $('#mbtn').html('Add <i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    $('#mbtn').html('Add');

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
                    $('#mbtn').html('Add');
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
