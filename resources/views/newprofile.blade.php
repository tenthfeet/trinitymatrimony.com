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
                    @php
                        echo profileCards($collection);
                    @endphp
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
