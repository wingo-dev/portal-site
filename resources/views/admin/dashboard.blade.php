@extends('layouts.dashboard_layout')
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-md-6"><a href="{{route('admin.view_product')}}" class="btn btn-primary">Add product</a></div>
                    <div class="col-md-6"><a href="{{route('admin.view_add_form')}}" class="btn btn-primary">Add customer</a></div>
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



