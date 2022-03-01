@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">Contact Us</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>Privacy Policy
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->



    <!-- Privacy Policy -->
    <div class="container">
        <h5 class="my-2">Privacy Policy</h5>
        <p class="text-justify pb-2">Please go through our Privacy Policy, which also governs your visit to our site. We
            understand, our members agree that their profile(s) may be used or indexed by search engines, for which we don’t
            have any control over them. Trinity matrimony and its network does not have any control over such search
            engines behavior and shall not be responsible for such activities of other search engines. We are also not
            responsible for any errors or representations on any of its pages or on any links or on any of the linked
            website pages.. The linked sites are not under the control of Trinity matrimony and Trinity matrimony is not
            responsible for the contents of any linked site or any link contained in a linked site, or any changes or
            updates to such sites. The photos which have uploaded in Trinity matrimony’s site is purely at members risk
            and we are not responsible for any illegal usage of your photos.
        </p>
        <p class="text-justify pb-2">
            Trinity matrimony has the right to change its features and services from time to time based on members
            comments or as a result of a change of policy in our company.
        </p>
    </div>
    <!-- /Terms & condition -->
@endsection
