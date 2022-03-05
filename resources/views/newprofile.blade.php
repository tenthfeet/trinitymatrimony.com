@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">New Profiles</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>New Profiles
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->

    <!--/grids-->
    <section id="search_div" class="w3l-grids-3" style="background-color: white;">
        <div class="container py-md-5">
            <div class="title-content text-left mb-lg-5 mb-4">
                <h3 class="title text-theme">New Profiles</h3>
            </div>
            <div id="s_result" class="row bottom-ab-grids my-3">
                <!--/row-grids-->
                @if (count($collection) > 0)
                    @foreach ($collection as $item)
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
                                            <p>
                                                @if ($item->dob != '1970-01-01')
                                                    {{ age($item->dob) }}
                                                @else
                                                Age not yet Provided
                                                @endif

                                                @if ($item->height)
                                                    
                                                , {{ $item->height }}cm
                                                @endif
                                                
                                            </p>
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
                    <div style="text-align: center;">Sorry, we are unable to find a perfect match based on the search
                        criteria.</div>
                @endif


                <!--//row-grids-->
            </div>
            <div class="d-flex justify-content-center">
                {{ $collection->links() }}
            </div>
        </div>
    </section>
    <!--//grids-->

@endsection
