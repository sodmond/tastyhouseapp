@extends('admin.layouts.auth', ['title' => 'Login'])

@section('content')
<div class="log-in-box">
    <div class="log-in-title">
        <h3>Admin Portal</h3>
        <h4>Log In Your Account</h4>
    </div>

    <div class="input-box">
        @if (count($errors))
            <div class="alert alert-danger">
                <strong class="text-danger">Whoops!</strong> Error validating data.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="row g-4" method="POST" action="">
            @csrf
            <div class="col-12">
                <div class="form-floating theme-form-floating log-in-form">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                    <label for="email">Email Address</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating theme-form-floating log-in-form">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
            </div>

            <div class="col-12">
                <div class="forgot-box">
                    <div class="form-check ps-0 m-0 remember-box">
                        <input class="checkbox_animated check-box" type="checkbox" id="flexCheckDefault" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                    </div>
                    @if (Route::has('admin.password.request'))
                        <a href="{{ route('admin.password.request') }}" class="forgot-password">Forgot Password?</a>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-animation w-100 justify-content-center">Log In</button>
            </div>
        </form>
    </div>

</div>
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">

                <div class="card-body p-4">
                    
                    <div class="text-center mb-2">
                        <a href="{{ route('home') }}">
                            <span><img src="{{ asset('img/favicon.png') }}" alt="" height="58"></span>
                        </a>
                        <h3>Admin Login</h3>
                    </div>

                    @if (count($errors))
                        <div class="alert alert-danger">
                            <strong class="text-danger">Whoops!</strong> Error validating data.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.login') }}" method="POST" class="pt-2">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" required 
                                value="{{ old('email') }}" placeholder="Enter your email" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            @if (Route::has('admin.password.request'))
                                <a href="{{ route('admin.password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                            @endif
                            <label for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required 
                                placeholder="Enter your password" autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-custom btn-block" type="submit"> Log In </button>
                        </div>

                    </form>

                    <!-- end row -->

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
--}}
@endsection
