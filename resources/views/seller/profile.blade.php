@extends('layouts.app', ['title' => 'Vendor Dashboard', 'activePage' => 'seller.profile'])

@section('content')
<section class="user-dashboard-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                @include('seller.layouts.sidebar', ['activePage' => 'seller.profile'])
            </div>

            <div class="col-xxl-9 col-lg-8">
                <div class="dashboard-right-sidebar">
                    <div class="dashboard-profile">
                        <div class="title">
                            <h2>My Profile</h2>
                            <span class="title-leaf">
                                <svg class="icon-width bg-gray">
                                    <use xlink:href="{{ asset('frontend/svg/leaf.svg#leaf') }}"></use>
                                </svg>
                            </span>
                        </div>

                        <div class="profile-tab dashboard-bg-box">
                            <div class="dashboard-title dashboard-flex">
                                <h3>Profile Details</h3>
                                <button class="btn btn-sm theme-bg-color text-white"><a class="text-white" href="{{ route('seller.profile.edit') }}">Edit Profile</a></button>
                                <button class="btn btn-sm theme-bg-color text-white"><a class="text-white" href="{{ route('seller.profile.password') }}">Change Password</a></button>
                            </div>

                            <ul>
                                <li>
                                    <h5 class="fw-bold">First Name :</h5>
                                    <h5>{{ auth('seller')->user()->firstname }}</h5>
                                </li>
                                <li>
                                    <h5 class="fw-bold">Last Name :</h5>
                                    <h5>{{ auth('seller')->user()->lastname }}</h5>
                                </li>
                                <li>
                                    <h5 class="fw-bold">Company Name :</h5>
                                    <h5>Grocery Store</h5>
                                </li>
                                <li>
                                    <h5 class="fw-bold">Email Address :</h5>
                                    <h5>{{ auth('seller')->user()->email }}</h5>
                                </li>

                                <li>
                                    <h5 class="fw-bold">Phone :</h5>
                                    <h5>0{{ auth('seller')->user()->phone }}</h5>
                                </li>

                                <li>
                                    <h5 class="fw-bold">Company Name :</h5>
                                    <h5>{{ auth('seller')->user()->companyname }}</h5>
                                </li>

                                <li>
                                    <h5 class="fw-bold">Address :</h5>
                                    <h5>{{ auth('seller')->user()->address }}</h5>
                                </li>

                                <li>
                                    <h5 class="fw-bold">City :</h5>
                                    <h5>{{ auth('seller')->user()->city }}</h5>
                                </li>

                                <li>
                                    <h5 class="fw-bold">State :</h5>
                                    <h5>{{ auth('seller')->user()->state }}</h5>
                                </li>

                                <li>
                                    <h5 class="fw-bold">Zip :</h5>
                                    <h5>{{ auth('seller')->user()->zip }}</h5>
                                </li>

                                <li>
                                    <h5 class="fw-bold">Bio :</h5>
                                    <h5>{{ auth('seller')->user()->bio }}</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection