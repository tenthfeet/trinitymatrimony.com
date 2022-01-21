@extends('layouts.app')

@section('content')

<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.html"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">Your Profile Details</li>
            </ul>
        </div>
        <div class="profile">
            <div class="col-md-8 profile_left">
                <h2>Your Profile Id : 254870</h2>

                <div class="col_4">
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist" style="color:white">
                            <li role="presentation" class="active"><a href="#basic" id="basic-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Basic Information</a>
                            </li>
                            <li role="presentation"><a href="#career" role="tab" id="career-tab" data-toggle="tab" aria-controls="career">Qualification and career</a></li>
                            <li role="presentation"><a href="#family" role="tab" id="family-tab" data-toggle="tab" aria-controls="family">About family</a></li>
                            <li role="presentation"><a href="#contact" role="tab" id="contact-tab" data-toggle="tab" aria-controls="contact">Contact details</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="basic" aria-labelledby="basic-tab">
                                <div class="basic_1">
                                    <h3>Basics </h3>
                                    <div class="col-sm-12 login_left">
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label >House Name</label>
                                                    <input type="text" id="housename" name="housename" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Gender</label>
                                                    <div class="select-block1">
                                                        @php
                                                        echo arrayToSelectOption(Arr::$gender,"gender","","","","Gender");
                                                        @endphp
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Date of Birth</label>
                                                    <input type="date" id="dob" name="dob" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Date of Baptism</label>
                                                    <input type="date" id="dobap" name="dobap" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Mother Tongue</label>
                                                    <div class="select-block1">
                                                        @php
                                                            echo arrayToSelectOption(Arr::$lang,"mothertongue","","","","Language");
                                                        @endphp
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Other Language Known</label>
                                                    <input type="text" id="otherlang" name="otherlang" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Particular Church</label>
                                                    <div class="select-block1">
                                                        @php
                                                            echo arrayToSelectOption(Arr::$church,"particularchurch","","","","Church");
                                                        @endphp
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Non Catholic Church</label>
                                                    <input type="text" id="noncath_church" name="noncath_church" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Height (cm)</label>
                                                    <input type="text" id="height" name="height" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Weight (Kg)</label>
                                                    <input type="text" id="weight" name="weight" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Blood Group</label>
                                                    <input type="text" id="blood" name="blood" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Complexion</label>
                                                    <input type="text" id="complex" name="complex" value="" size="60" maxlength="60" class="form-text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Marital Status</label>
                                                    <div class="select-block1">
                                                        @php
                                                            echo arrayToSelectOption(Arr::$marital,"maritalstatus","","","","Status");
                                                        @endphp
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Upload Photo<span class="form-required" title="This field is required.">*</span></label>
                                                    <input type="file" id="photo" name="photo" value="" class="form-text required">
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="form-group col-sm-6">
                                                    <label for="edit-name">About (Describe about yourself in few words)</label>
                                                    <textarea name="about" id="about" cols="30" class="form-text" style="height: 100px;"></textarea>
                                                </div>
                                            <div class="form-group col-sm-6">
                                                <label for="edit-name">Partner preference any</label>
                                                <textarea name="preference" id="preference" cols="30" class="form-text" style="height: 100px;"></textarea>
                                            </div>
                                            
                                        </div>


                                            <div class="form-actions">
                                                <input type="submit" id="edit-submit"  value="SAVE" class="btn_1 submit">
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
                                        <div class="col-md-12 basic_1-left">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Educational Qualification</label>
                                                    <div class="select-block1">
                                                        @php
                                                            echo arrayToSelectOption(Arr::$qualification,"qualification","","","","Qualification");
                                                        @endphp
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Occupation</label>
                                                    <input type="text" id="occupation" name="occupation" value="" size="60" maxlength="150" class="form-text required">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Area / Field</label>
                                                    <input type="text" id="area" name="area" value="" size="60" maxlength="150" class="form-text">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Annual income</label>
                                                    <input type="number" id="income" name="income" value=""  class="form-text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="edit-name">Address of the Firm / Company / Self business</label>
                                                    <textarea name="firmaddress" id="firmaddress" cols="30" class="form-text" style="height: 100px;"></textarea>
                                                </div>
                                                
                                            </div>

                                            <div class="form-actions">
                                                <input type="submit" id="edit-submit" value="SAVE" class="btn_1 submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="family" aria-labelledby="family-tab">
                                <div class="basic_1 basic_2">
                                    <div class="basic_1-left">
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for="edit-name">Father's Name</label>
                                                <input type="text" id="fathername" name="fathername" value="" size="60" maxlength="150" class="form-text">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="edit-name">House Name</label>
                                                <input type="text" id="fhouse" name="fhouse" value="" size="60" maxlength="150" class="form-text">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="edit-name">Father's Occupation</label>
                                                <input type="text" id="foccupation" name="foccupation" value="" size="60" maxlength="150" class="form-text">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for="edit-name">Mother's Name</label>
                                                <input type="text" id="mothername" name="mothername" value="" size="60" maxlength="150" class="form-text">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="edit-name">House Name</label>
                                                <input type="text" id="mhouse" name="mhouse" value="" size="60" maxlength="150" class="form-text">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="edit-name">Mother's Occupation</label>
                                                <input type="text" id="moccupation" name="moccupation" value="" size="60" maxlength="150" class="form-text">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label>Do you have Siblings?</label>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <div class="select-block1">
                                                    @php
                                                        echo arrayToSelectOption(Arr::$ny,"siblings")
                                                    @endphp
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <input type="button" id="addsibling" value="+" class="btn_1 submit" style="margin-top: 0px;">
                                            </div>

                                            <table id="sib_table" class="table table-bordered">
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

                                        <div class="form-actions">
                                            <input type="submit" id="edit-submit"  value="SAVE" class="btn_1 submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="contact" aria-labelledby="contact-tab">
                                <div class="basic_1 basic_2">
                                    <div class="basic_1-left">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Present parish</label>
                                                <input type="text" id="pparish" name="pparish" value="" size="60" maxlength="60" class="form-text">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>From Which year</label>
                                                <input type="text" id="pyear" name="pyear" value="" size="60" maxlength="60" class="form-text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Former parish, Diocese</label>
                                                <input type="text" id="fparish" name="fparish" value="" size="60" maxlength="60" class="form-text">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>House</label>
                                                <div class="select-block1">
                                                    @php
                                                        echo arrayToSelectOption(Arr::$housetype,"housetype");
                                                    @endphp
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="edit-name">Address for Contact</label>
                                                <textarea name="caddress" id="caddress" cols="30" class="form-text" style="height: 100px;"></textarea>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="edit-name">Permanent Address</label>
                                                <textarea name="paddress" id="paddress" cols="30" class="form-text" style="height: 100px;"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label >Phone number 1</label>
                                                <input type="number" id="mobile1" name="mobile1" value="" size="60" maxlength="60" class="form-text">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label >Phone number 2</label>
                                                <input type="number" id="mobile2" name="mobile2" value="" size="60" maxlength="60" class="form-text">
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" id="edit-submit"  value="SAVE" class="btn_1 submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 profile_right">
                <div class="newsletter">
                    <form>
                        <input type="text" name="ne" size="30" required="" placeholder="Enter Profile ID :">
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
    sib();

    $('#siblings').change(function() {
        sib();
    });

    function sib() {
        if ($('#siblings').val() == 'Yes') {
            $('#addsibling').show();
            $('#sib_table').show();
        } else {
            $('#addsibling').hide();
            $('#sib_table').hide();
        }
    }

    $('#addsibling').click(function() {
        addrow();
    });

    $(document).on("DOMNodeInserted", function() {
        $(".del").click(function() {
            if ($(".table tbody tr").length > 1) {
                if (confirm("Are you really want to delete this row...?")) {
                    $(this).closest("tr").remove();
                }
            }
        });
    });

    function addrow() {
        let data = '';
        data += '<tr>';
        data += '<td style="padding:0px;"><input class="form-control" type="text" name="sibname[]" required></td>';
        data += '<td style="padding:0px;"><input class="form-control" type="text" name="sibage[]" required></td>';
        data += '<td style="padding:0px;"><input class="form-control" type="text" name="sibjob[]" required></td>';
        data += '<td style="padding:0px;"><input class="form-control" type="text" name="sibpartner[]" required></td>';
        data += '<td style="padding:0px;"><input class="form-control" type="text" name="sibhouse[]" required></td>';
        data += '<td style="padding:0px;"><input type="button" class="btn btn-danger btn-sm del" value="X"></td>';
        data += '</tr>';
        $('#sib_table tbody').append(data);
    }
</script>

@endsection