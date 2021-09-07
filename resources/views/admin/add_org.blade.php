@extends('layouts.dashboard_layout')
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Add Organization</h5>
                @if(Session::has('message'))
                    <div class="alert alert-inv alert-inv-danger" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('admin.store_org') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control mt-15" placeholder="Organization Name" name="org_name" required>
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
                <h5 class="hk-sec-title">Organization lists & Download Directory</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Organization Name</th>
                                        <th>Directory</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no = 0)
                                    @foreach($orgs as $org)
                                        @php($no++)
                                        <tr>
                                            <th scope="row">{{$no}}</th>
                                            <td>{{$org->org_name}}</td>
                                            <td>{{$org->org_name}}</td>
                                            <td><a href="{{route('admin.delete_org', $org->id)}}"><span class="badge badge-danger">Delete</span></a></td>
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
