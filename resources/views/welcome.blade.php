@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="banner-infhny">
            <h3>You don't need to go far to find what matters.</h3>
            <h6 class="mb-3">Discover your Soulmate</h6>
            <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                <form action="#" method="post" class="booking-form">
                    <div class="row book-form">
                        <div class="form-input col-md-3 mt-md-0 mt-3">
                            {{-- Looking For --}}
                            @php
                                echo selectOptionFromArray(Arrays::$lookingFor, 'selectpicker', 'selectpicker');
                            @endphp
                        </div>
                        <div class="form-input col-md-3 mt-md-0 mt-3">
                            {{-- Age From --}}
                            <input type="number" name="" placeholder="Age From">
                        </div>
                        <div class="form-input col-md-3 mt-md-0 mt-3">
                            {{-- Age To --}}
                            <input type="number" name="" placeholder="Age To">
                        </div>
                        <div class="bottom-btn col-md-3 mt-md-0 mt-3">
                            <button id="search" class="btn btn-style btn-secondary"><span class="fa fa-search mr-1"
                                    aria-hidden="true"></span> Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#search').click(function(e) {
            e.preventDefault();
            var elmnt = document.getElementById("search_div");
            elmnt.scrollIntoView();
        });
    </script>
@endsection
