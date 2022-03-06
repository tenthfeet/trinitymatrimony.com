@extends('layouts.other')

@section('content')
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb text-left">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">FAQ</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>FAQ
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->



    <!-- Privacy Policy -->
    <div class="container py-5">
        <div class="py-lg-5">
            <div class="mb-4">
                <h5 class="my-2">Q: Criteria for approving the profile?</h5>
                <p class="text-justify pb-2">
                    Ans: For registering with our matrimony you will be getting a OTP SMS to your mobile number to verify
                    your mobile number. If you have verified you can proceed registration then you have to
                    wait for the admin approval of your profile.
                </p>
            </div>
            <div class="mb-4">
                <h5 class="my-2">Q : How do I know that my profile is approved ?</h5>
                <p class="text-justify pb-2">
                    Ans: You will be getting a notification mail if admin approves your profile.
                </p>
            </div>
            <div class="mb-4">
                <h5 class="my-2">Q:How do I get my User ID and Password of my profile?</h5>
                <p class="text-justify pb-2">
                    Ans: Login with your registered email and password and your profile id will be in your profile.
                </p>
            </div>
            <div class="mb-4">
                <h5 class="my-2">Q : What information can other members view from my profile?</h5>
                <p class="text-justify pb-2">
                    Ans: All members can view your basic information. Registered members can view all your profile information.
                </p>
            </div>
            <div class="mb-4">
                <h5 class="my-2">Q : How do I create my complete profile ?</h5>
                <p class="text-justify pb-2">
                    Ans:You have to login with your account and Click on the update profile button to create complete profile.
                </p>
            </div>
            <div class="mb-4">
                <h5 class="my-2">Q : How can I make changes on my profile ?</h5>
                <p class="text-justify pb-2">
                    Ans: At any time, you can update your profile by clicking edit profile button in your profile.
                </p>
            </div>
            <div class="mb-4">
                <h5 class="my-2">Q : How Can I Search Profiles and contact them ?</h5>
                <p class="text-justify pb-2">
                    Ans: Registered members can search the profiles in our matrimony and view the contact details of the persons.
                </p>
            </div>
        </div>
    </div>
    <!-- /Terms & condition -->
@endsection
