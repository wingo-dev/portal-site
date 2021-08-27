@extends('layouts.dashboard_layout')
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Current Customer detail</h5>
                @if(Session::has('message'))
                <div class="alert alert-inv alert-inv-success" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('user.change_store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control mt-15" Value="{{ Auth::user()->first_name }}" name="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mt-15" value="{{ Auth::user()->last_name }}" name="last_name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control mt-15" value="{{ Auth::user()->email }}" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mt-15" placeholder="New Password" name="password">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary mt-15">Change Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <!-- /Container -->

        <!-- Footer -->
        <div class="hk-footer-wrap container">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p>Design by<a href="#" class="text-dark" >WEB developer</a> © {{ date('Y') }}</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->
    </div>
@endsection
