<div class="dashboard-left-sidebar">
    <div class="close-button d-flex d-lg-none">
        <button class="close-sidebar">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="profile-box">
        <div class="cover-image">
            <img src="{{ asset('frontend/images/inner-page/cover-img.png') }}" class="img-fluid blur-up lazyload"
                alt="">
        </div>

        <div class="profile-contain">
            <div class="profile-image">
                <div class="position-relative">
                    @php $profilepix = asset(empty(auth('web')->user()->image) ? 'img/user-icon.png' : 'storage/user/profile_pix/'.auth('web')->user()->image ); @endphp
                    <img src="{{ $profilepix }}" class="blur-up lazyload update_img" alt="">
                </div>
            </div>

            <div class="profile-name">
                <h3>{{ ucwords(auth('web')->user()->firstname.' '.auth('web')->user()->lastname) }}</h3>
                <h6 class="text-content">{{ auth('web')->user()->email }}</h6>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="#pills-tabContent" class="nav-link {{ $activePage == 'user.home' ? 'active' : '' }}" id="pills-dashboard-tab"
                data-bs-toggle="pill" data-bs-target="#pills-dashboard" role="tab"><i
                    data-feather="home"></i>
                DashBoard</a>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                data-bs-target="#pills-order" type="button" role="tab"><i
                    data-feather="shopping-bag"></i>Order</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-product-tab" data-bs-toggle="pill"
                data-bs-target="#pills-product" type="button" role="tab"><i
                    data-feather="shopping-bag"></i>Favorites</button>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link {{ $activePage == 'user.profile' ? 'active' : '' }}" href="{{ route('user.profile') }}">
                <i data-feather="user"></i>Profile</a>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                data-bs-target="#pills-security" type="button" role="tab"><i
                    data-feather="settings"></i>
                Setting</button>
        </li>

        <li class="nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <a class="nav-link" href="{{ route('logout') }}">
                <i data-feather="log-out"></i> Log Out</a>
        </li>
    </ul>
</div>