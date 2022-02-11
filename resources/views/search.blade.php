@extends('layouts.app')

@section('content')
    <div class="grid_2" style="margin-bottom:1px;">
        <h2>Search Profiles</h2>
        <div class="heart-divider">
            <span class="grey-line"></span>
            <i class="fa fa-heart pink-heart"></i>
            <i class="fa fa-heart grey-heart"></i>
            <span class="grey-line"></span>
        </div>

    </div>
    </div>
    <div style="margin-bottom:1em;background-color:rgba(12, 9, 10, 0.29);">
        <div class="container wrap_1">
            <form action="{{ url('/search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-2">
                        <label class="gender_1">I am looking for :</label>
                        <div class="age_box1" style="max-width: 100%; display: inline-block;">
                            @php
                                // $v=$req->gender?$req->gender:'';
                                echo arrayToSelectOption(Arrays::$lookingFor, 'gender', '', 'required', '', 'Gender');
                            @endphp
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="gender_1">Education :</label>
                        <div class="age_box1" style="max-width: 100%; display: inline-block;">
                            @php
                                // $v=$req->qualification?$req->qualification:'';
                                echo arrayToSelectOption(Arrays::$qualification, 'qualification', '', '', '', 'Edu. Qual.');
                            @endphp
                        </div>
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="gender_1">From Age :</label>
                        <input class="transparent" id="from" name="from" placeholder="From:" type="number" value=""
                            max="60">
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="gender_1">To Age :</label>
                        <input id="to" name="to" class="transparent" placeholder="To:" type="number" value="" max="60">
                    </div>
                    <div class="form-group col-sm-2">
                        <label class="gender_1">Annual Income :</label>
                        <div class="age_box1" style="max-width: 100%; display: inline-block;">
                            @php
                                // $v=$req->income?$req->income:'';
                                echo arrayToSelectOption(Arrays::$income, 'income', '', '', '', 'Income');
                            @endphp
                        </div>
                    </div>
                    <div class="form-group col-sm-2" style="margin-top: 25px;">
                        <button id="search" class="hvr-wobble-vertical"
                            style="background-color: rgba(255, 0, 0, 0);outline: none;color: #fff;border: 1px solid #fff;">
                            Find Matches
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="grid_2">
        {{-- @if ($collection) --}}
        <div class="container">
            <h2>Matched Profiles</h2>
            <div id="ico" class="heart-divider">
                <span class="grey-line"></span>
                <i class="fa fa-heart pink-heart"></i>
                <i class="fa fa-heart grey-heart"></i>
                <span class="grey-line"></span>
            </div>
            <div id="load" class="loader heart-divider" style="display: none;">
                <div><img src="{{ asset('/images/heart.svg') }}"></div>
                <div><img src="{{ asset('/images/heart.svg') }}"></div>
                <div><img src="{{ asset('/images/heart.svg') }}"></div>
                <div><img src="{{ asset('/images/heart.svg') }}"></div>
                <div><img src="{{ asset('/images/heart.svg') }}"></div>
            </div>
            <div class="row_1">

                <div class="col-md-8 suceess_story">
                    <ul id="matches">
                        <li>
                            <div class="suceess_story-content-container">
                                <div class="suceess_story-content-info">
                                    <p>Start finding your Soulmate..!</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>

            </div>

        </div>
        {{-- @endif --}}
        <div class="ctr">
            {{-- <span id="p-details"></span> --}}
            <ul id="pagination" class="pagination float-right"></ul>
        </div>
    </div>

    <script>
        const getAge = birthDate => Math.floor((new Date() - new Date(birthDate).getTime()) / 3.15576e+10)
        const page = {
            cp: 1,
            tnor: 0,
            gender: null,
            qualification: null,
            from: null,
            to: null,
            income: null,
            rpp: 10,
            nop: function() {
                return Math.ceil(this.tnor / this.rpp);
            },
            data: "",
            set s_tnor(tnor) {
                this.tnor = tnor;
            }
        };

        function asset(url) {
            let prefix = "{{ env('APP_URL') }}/";
            return prefix + url;
        }
        $('#search').click(function(event) {
            event.preventDefault();
            let gender = $('#gender').val();
            if (gender == '') {
                Swal.fire({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    text: 'Please Select gender',
                    icon: 'error',
                    timer: 3000
                });
            } else {
                search();
                getTableData(page.cp);
            }

        });

        function search() {
            let gender = $('#gender').val();
            let qualification = $('#qualification').val();
            let from = $('#from').val();
            let to = $('#to').val();
            let income = $('#income').val();

            page.cp = 1;
            page.gender = gender;
            page.qualification = qualification;
            page.from = from;
            page.to = to;
            page.income = income;

            // console.log(page);
        }

        function getTableData(cp) {
            let gender = $('#gender').val();
            let qualification = $('#qualification').val();
            let from = $('#from').val();
            let to = $('#to').val();
            let income = $('#income').val();

            let dstring = {
                "cp": cp,
                "gender": gender,
                "qualification": qualification,
                "from": from,
                "to": to,
                "married": income
            }
            // console.log(dstring);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/search') }}",
                data: dstring,
                cache: false,
                datatype: "json",
                beforeSend: function() {
                    $('#search').html('Finding ...');
                    $('#search').attr('disabled', true);
                    $('#ico').hide();
                    $('#load').show();
                },
                success: function(result) {
                    $('#search').attr('disabled', false);
                    $('#search').html("Find Matches");
                    $('#ico').show();
                    $('#load').hide();
                    // console.log(res);
                    // var sql_data = JSON.parse(result);
                    page.s_tnor = result.tnor;
                    page.data = result.data;
                    // console.log(page);
                    const t = page.data;

                    let body = "";


                    if (page.tnor == 0) {
                        body +=
                            '<li><div class="suceess_story-content-container"><div class="suceess_story-content-info">' +
                            '<p>Sorry! No Matches found...</p></div></div></li>'
                    } else {
                        for (let x in t) {
                            //Add table rows
                            // if(t[x].dob=='1970-01-01')
                            let photo = t[x].photo ? asset(t[x].photo) : '';
                            let firstname = t[x].firstname ? t[x].firstname : '';
                            let surname = t[x].surname ? t[x].surname : '';
                            let about = t[x].about ? t[x].about : '';
                            let dob = t[x].dob != '1970-01-01' ? getAge(t[x].dob) : '';
                            let qualification = t[x].qualification ? t[x].qualification : '';
                            let income = t[x].income ? t[x].income : '';


                            body += '<li>' +
                                '<div class="suceess_story-date">' +
                                '<span class="entry-1">' + t[x].pid + '</span>' +
                                '</div>' +
                                '<div class="suceess_story-content-container">' +
                                '<figure class="suceess_story-content-featured-image">' +
                                '<img width="75" height="75" src="' + photo + '"' +
                                'class="img-responsive" alt="" />' +
                                '</figure>' +
                                '<div class="suceess_story-content-info">' +
                                '<h4><a href="' + asset('viewprofile/' + t[x].uid) + '">' + firstname + ' ' +
                                surname + '</a>' +
                                '</h4>' +
                                '<p>' + about + '</p>' +
                                '<table class="table_working_hours">' +
                                '<tr class="opened">' +
                                '<td class="day_label" style="width:30%">Age :</td>' +
                                '<td class="day_value">' + dob + ' Years</td>' +
                                '</tr>' +
                                '<tr class="opened">' +
                                '<td class="day_label" style="width:30%">Qualification:</td>' +
                                '<td class="day_value">' + qualification + '</td>' +
                                '</tr>' +
                                '<tr class="opened">' +
                                '<td class="day_label" style="width:30%">Annual Income:</td>' +
                                '<td class="day_value">' + income + '</td>' +
                                '</tr>' +
                                '</table>' +
                                '</div>' +
                                '</div>' +
                                '</li>';
                        }
                    }
                    $('#matches').html(body);
                    pagination();
                    // $("#loader").hide();
                }

            });
        }



        function pagination() {
            let f_num = ((page.cp - 1) * page.rpp) + 1;
            let s_num = ((((page.cp - 1) * page.rpp) + page.rpp) < page.tnor) ? (((page.cp - 1) * page.rpp) + page
                .rpp) : page.tnor;
            let msg = 'Showing ' + f_num + ' to ' + s_num + ' rows from ' + page.tnor + ' rows';
            if (page.tnor != 0) {
                $('#p-details').show();
                $('#p-details').html(msg);
            } else {
                $('#p-details').hide();
            }
            let nop = page.nop();
            let previous = (page.cp == 1) ? 1 : (page.cp - 1);
            let next = (page.cp == page.nop()) ? page.cp : (page.cp + 1);
            let pagination = "";
            //Previous Buttons

            pagination += '<li id="p" class="page-item"><a class="page-link" href="#" onclick="setPage(' + previous +
                ')">Previous</a></li>';

            //if number of pages id less than or equal to 9
            if (nop <= 9) {
                for (let i = 1; i <= nop; i++) {
                    let current = (i == page.cp) ? 'active' : '';
                    let inner = (i == page.cp) ? '<span class="page-link">' + i + '</span>' :
                        '<a class="page-link" href="#" onclick="setPage(' + i + ')">' + i + '</a>';
                    pagination += '<li class="page-item pn ' + current + '">' + inner + '</li>';
                }
            } else {

                if (page.cp < 5) {
                    for (let i = 1; i <= 5; i++) {
                        let current = (i == page.cp) ? 'active' : '';
                        let inner = (i == page.cp) ? '<span class="page-link">' + i + '</span>' :
                            '<a class="page-link" href="#" onclick="setPage(' + i + ')">' + i + '</a>';
                        pagination += '<li class="page-item pn ' + current + '">' + inner + '</li>';
                    }
                    pagination += '<li  class="page-item disabled"><a class="page-link" href="#" >...</a></li>';
                    pagination += '<li id="l" class="page-item"><a class="page-link" href="#" onclick="setPage(' + nop +
                        ')">' + nop + '</a></li>';

                } else if (page.cp >= (nop - 3)) {
                    pagination +=
                        '<li id="f" class="page-item"><a class="page-link" href="#" onclick="setPage(1)">1</a></li>';
                    pagination += '<li  class="page-item disabled"><a class="page-link" href="#" >...</a></li>';

                    for (let j = -4; j <= 0; j++) {
                        pn = nop + j;
                        let current = (pn == page.cp) ? 'active' : '';
                        let inner = (pn == page.cp) ? '<span class="page-link">' + pn + '</span>' :
                            '<a class="page-link" href="#" onclick="setPage(' + pn + ')">' + pn + '</a>';
                        pagination += '<li class="page-item ' + current + '">' + inner + '</li>';
                    }
                } else {
                    pagination +=
                        '<li id="f" class="page-item"><a class="page-link" href="#" onclick="setPage(1)">1</a></li>';
                    pagination += '<li  class="page-item disabled"><a class="page-link" href="#" >...</a></li>';
                    for (let j = -1; j <= 1; j++) {
                        pn = page.cp + j;
                        let current = (pn == page.cp) ? 'active' : '';
                        let inner = (pn == page.cp) ? '<span class="page-link">' + pn + '</span>' :
                            '<a class="page-link" href="#" onclick="setPage(' + pn + ')">' + pn + '</a>';
                        pagination += '<li class="page-item ' + current + '">' + inner + '</li>';
                    }
                    pagination += '<li  class="page-item disabled"><a class="page-link" href="#" >...</a></li>';
                    pagination += '<li id="l" class="page-item"><a class="page-link" href="#" onclick="setPage(' + nop +
                        ')">' + nop + '</a></li>';

                }

            }
            //Next Buttons

            pagination += '<li id="n" class="page-item"><a class="page-link" href="#" onclick="setPage(' + next +
                ')">Next</a></li>';
            $("#pagination").html(pagination);
            if (page.cp == 1) {
                $("#f").addClass("disabled");
                $("#p").addClass("disabled");
            }
            if (page.cp == nop) {
                $("#n").addClass("disabled");
                $("#l").addClass("disabled");
            }
        }
    </script>
@endsection
