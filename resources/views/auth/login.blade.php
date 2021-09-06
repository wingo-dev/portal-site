@extends('layouts.auth_layout')
@section('content')
    <!-- Main Content -->
    <div class="hk-pg-wrapper hk-auth-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 pa-0">
                    <div class="auth-form-wrap pt-xl-0 pt-70">
                        <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                            <a class="d-flex auth-brand align-items-center justify-content-center  mb-20" href="#">
                                <img class="brand-img d-inline-block mr-5" src="{{asset('img/logo.jpg')}}" alt="brand" />
                            </a>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h1 class="display-4 text-center mb-10">Welcome</h1>
                                <p class="text-center mb-30">Sign in to your account.</p>
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox mb-25">
                                    <input class="custom-control-input" id="same-address" type="checkbox">
                                    <label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
                                </div>
                                <button class="btn btn-warning btn-block" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
@endsection
