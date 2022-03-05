@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            {{-- <div class="container py-2">
                <h2 class="title">Search Profiles</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Search Profiles
                    </li>
                </ul>
            </div> --}}
            <div class="container">
                <div iclass="banner-infhny">
                    {{-- <h3>Way to To Make Your Wedding</h3> --}}
                    {{-- <h6 class="mb-3 text-white">Discover your Soulmate</h6> --}}
                    <h2 class="title">Search Profiles</h2>

                    <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                        <form action="{{ url('/search') }}" method="get" class="booking-form">
                            <div class="row book-form">
                                <div class="form-input col-md-2 mt-md-0 mt-3">
                                    {{-- Looking For --}}
                                    <label class="text-theme">Looking For</label>
                                    @php
                                        echo selectOptionFromArray(Arrays::$lookingFor, 'gender', 'selectpicker','',request()->get('gender'));
                                    @endphp
                                </div>
                                <div class="form-input col-md-2 mt-md-0 mt-3">
                                    <label class="text-theme">Qualification</label>
                                    @php
                                        echo selectOptionFromArray(Arrays::$qualification, 'qualification', 'selectpicker', '', request()->get('qualification'), 'Edu. Qual.');
                                    @endphp
                                </div>
                                <div class="form-input col-md-2 mt-md-0 mt-3">
                                    {{-- Age From --}}
                                    <label class="text-theme">Age From</label>
                                    <input type="number" name="afrm" placeholder="Age From" value="{{request()->get('afrm')}}">
                                </div>
                                <div class="form-input col-md-2 mt-md-0 mt-3">
                                    {{-- Age To --}}
                                    <label class="text-theme">Age To</label>
                                    <input type="number" name="ato" placeholder="Age To" value="{{request()->get('ato')}}">
                                </div>
                                <div class="form-input col-md-2 mt-md-0 mt-3">
                                    <label class="text-theme">Income</label>
                                    @php
                                        echo selectOptionFromArray(Arrays::$income, 'income', 'selectpicker', '', request()->get('income'), 'Income');
                                    @endphp
                                </div>
                                <div class="bottom-btn col-md-2 mt-md-0 mt-3">
                                    <label class="text-theme"></label>
                                    <button id="search" class="btn btn-style btn-secondary"><span class="fa fa-search mr-1"
                                            aria-hidden="true"></span> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->

    <!--/grids-->
    <section id="search_div" class="w3l-grids-3" style="background-color: white;">
        <div class="container py-md-5">
            <div class="title-content text-left mb-lg-5 mb-4">
                <h3 class="title text-theme">Search Results</h3>
            </div>
            <div id="s_result" class="row bottom-ab-grids my-3">
                <!--/row-grids-->
                @if (count($profiles) > 0)
                    @foreach ($profiles as $item)
                        <div class="col-lg-6 subject-card mt-lg-0 mt-4">
                            <div class="subject-card-header p-4">
                                <a href="{{ url('viewprofile/' . $item->uid) }}" class="card_title p-lg-4d-block">
                                    <div class="row align-items-center">
                                        <div class="col-sm-5 subject-img text-center">
                                            <img src="{{ asset($item->photo) }}" class="img-fluid" alt=""
                                                style="height: 150px;">
                                        </div>
                                        <div class="col-sm-7 subject-content mt-sm-0 mt-4">

                                            <div class="dst-btm">
                                                <h6 class="">Profile ID </h6>
                                                <span>{{ $item->pid }}</span>
                                            </div>
                                            <p>{{age($item->dob)}}, {{$item->height}}cm</p>
                                            <p class="sub-para">{{ $item->occupation }}</p>
                                            <p class="sub-para">Madurai,Tamil Nadu, India</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- {{ count($profiles) }} --}}
                    <div style="text-align: center;">Sorry, we are unable to find a perfect match based on the search criteria.</div>
                    
                @endif


                <!--//row-grids-->
            </div>
            <div class="d-flex justify-content-center">
                {{ $profiles->links() }}
            </div>
        </div>
    </section>
    <!--//grids-->
@endsection
