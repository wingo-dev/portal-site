@extends('layouts.dashboard_layout')
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Add Customer</h5>
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('admin.store_customer') }}" method="post">
                            @csrf
                            <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mt-15" placeholder="First Name" name="first_name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mt-15" placeholder="Last Name" name="last_name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control mt-15" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mt-15" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control custom-select  mt-15" name="org" required>
                                            <option selected>Select Organization</option>
                                            @foreach($orgs as $org)
                                                <option value="{{ $org->id }}">{{ $org->org_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary mt-15">Save</button>
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
