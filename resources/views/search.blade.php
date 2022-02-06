@extends('layouts.app')

@section('content')
    <div class="grid_2">
        @if ($collection)
            <div class="container">
                <h2>Matched Profiles</h2>
                <div class="heart-divider">
                    <span class="grey-line"></span>
                    <i class="fa fa-heart pink-heart"></i>
                    <i class="fa fa-heart grey-heart"></i>
                    <span class="grey-line"></span>
                </div>
                <div class="row_1">

                    <div class="col-md-8 suceess_story">
                        <ul>
                            @if ($collection->count())
                                @foreach ($collection as $item)
                                    <li>
                                        <div class="suceess_story-date">
                                            <span class="entry-1">{{ $item->pid }}</span>
                                        </div>
                                        <div class="suceess_story-content-container">
                                            <figure class="suceess_story-content-featured-image">
                                                <img width="75" height="75" src="{{ asset($item->photo) }}"
                                                    class="img-responsive" alt="" />
                                            </figure>
                                            <div class="suceess_story-content-info">
                                                <h4><a
                                                        href="{{ url('/viewprofile/' . $item->uid) }}">{{ $item->firstname . ' ' . $item->surname }}</a>
                                                </h4>
                                                <p>{{ $item->about }}</p>
                                                <table class="table_working_hours">
                                                    <tr class="opened">
                                                        <td class="day_label">Age :</td>
                                                        <td class="day_value">{{ age($item->dob) }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Qualification:</td>
                                                        <td class="day_value">{{ $item->qualification }}</td>
                                                    </tr>
                                                    <tr class="opened">
                                                        <td class="day_label">Annual Income:</td>
                                                        <td class="day_value">{{ $item->income }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <div class="suceess_story-content-container">
                                        <div class="suceess_story-content-info">
                                            <p>Sorry! No Matches found...</p>
                                        </div>
                                    </div>

                                </li>
                            @endif

                        </ul>
                    </div>
                    <div class="clearfix"> </div>

                </div>
                
            </div>
        @endif

    </div>
@endsection
