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
                                    <input type="text" class="form-control mt-15" placeholder="First Name"
                                           name="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mt-15" placeholder="Last Name"
                                           name="last_name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control mt-15" placeholder="Email" name="email"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mt-15" placeholder="Password"
                                           name="password">
                                </div>
                                <div class="col-md-6 mt-15">
                                    <select class="select2 select2-multiple " multiple="multiple" name="org[]" data-placeholder="Choose">
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
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Registered Customers</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=0)
                                    @foreach($users as $user)
                                        @php($no++)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><a href="{{ route('admin.delete_customer', $user->id) }}"><span class="badge badge-danger">Delete</span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                        <p>Design by<a href="#" class="text-dark">WEB developer</a> © {{ date('Y') }}</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->
    </div>
@endsection
