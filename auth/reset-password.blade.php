@extends('layouts.dashly-guest')
@section('title', 'Reset your password')
@section('content')
    <div class="row align-items-center justify-content-center vh-100">
        <div class="py-6 shadow-sm col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3">
            @if (Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="text-center">
                <a href="/">
                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" class="w-50">
                </a>
            </div>
            <!-- Title -->
            <h1 class="mb-2 text-center">
                Reset Password
            </h1>

            <!-- Subtitle -->
            <p class="text-center text-secondary">
                Enter your email address and your new password to reset it.
            </p>

            <!-- Form -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label">
                                Email Address
                            </label>
                            <!-- Input -->
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="Your email address">
                            @error('email')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label">
                                Password
                            </label>

                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input
                                    placeholder="Your password" name="password" required>

                                <button type="button" class="px-4 input-group-text text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                        @error('password')
                            <small class="fs-6 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label">
                                Confirm password
                            </label>
                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input
                                    placeholder="Your password again" name="password_confirmation" required>

                                <button type="button" class="px-4 input-group-text text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="text-center row align-items-center">
                    <div class="col-12">
                        <!-- Button -->
                        <button type="submit" class="mt-6 mb-2 btn w-100 btn-primary">Reset password</button>
                    </div>
                </div> <!-- / .row -->
            </form>
        </div>
    </div> <!-- / .row -->
@endsection
