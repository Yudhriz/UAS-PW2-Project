@extends('layouts.app')

@section('title', 'Login - Suntronic Store')

@section('content')

    <body>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <div
                class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-md-8 col-lg-6 col-xxl-3">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a href="{{ url('/') }}"
                                        class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="{{ asset('home/images/icons/logo.png') }}" width="60" alt="">
                                        <h3 style="font-family: 'EB Garamond'; color: black;">Suntronic Store</h3>
                                    </a>
                                    <p class="text-center">Login Your Account</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input primary" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label text-dark" for="remember">
                                                    Remeber this Device
                                                </label>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <a class="text-primary fw-bold"
                                                    href="{{ route('password.request') }}">Forgot Password ?</a>
                                            @endif
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">{{ __('Login') }}</button>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <p class="fs-4 mb-0 fw-bold">Join to Users?</p>
                                            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an
                                                account</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    </body>
@endsection
