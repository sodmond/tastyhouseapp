@extends('admin.layouts.auth', ['title' => 'Password Reset'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">

                <div class="card-body p-4">
                    
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}">
                            <span><img src="{{ asset('img/logo.png') }}" alt="" height="58"></span>
                        </a>
                        <p class="text-muted mt-3">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                    </div>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.password.email') }}" method="POST" class="pt-2">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-custom btn-block" type="submit">{{ __('Send Password Reset Link') }}</button>
                        </div>

                    </form>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted mb-0">Back to <a href="{{ route('admin.login') }}" class="text-dark ml-1"><b>Log in</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
@endsection
